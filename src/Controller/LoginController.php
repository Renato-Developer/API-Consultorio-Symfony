<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Firebase\JWT\JWT;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class LoginController extends AbstractController
{
    private UserRepository $repository;
    private UserPasswordHasherInterface $hasher;

    public function __construct(
        UserRepository $repository,
        UserPasswordHasherInterface $hasher
    ) {
        $this->repository = $repository;
        $this->hasher = $hasher;
    }

    public function login(Request $request): Response
    {
        $dadosEmJson = json_decode($request->getContent());

        $this->VerificarTodasAsPropriedades($dadosEmJson);

        if (is_null($dadosEmJson->username) OR is_null($dadosEmJson->password)) {
            return new JsonResponse(
                ['error' => 'Favor Preencher Usuário e Senha'],
                Response::HTTP_BAD_REQUEST
            );
        }

        /**@var User $user*/
        $user = $this->repository->findOneBy([
           'username' => $dadosEmJson->username
        ]);

        if(!$this->hasher->isPasswordValid($user, $dadosEmJson->password)) {
            return new JsonResponse([
                'error' => 'Usuário ou Senha Inválidos'],
                Response::HTTP_UNAUTHORIZED
            );
        }

        $token = JWT::encode(['username' => $user->getUserIdentifier()], 'SecretKey', 'HS256');

        return new JsonResponse([
            'access_token' => $token
        ]);
    }

    /**
     * @param $dadosEmJson
     */
    public function VerificarTodasAsPropriedades($dadosEmJson): void
    {
        if (
            !property_exists($dadosEmJson, 'username') ||
            !property_exists($dadosEmJson, 'password')
        ) {
            throw new AuthenticationException('Erro no Login');
        }
    }
}
