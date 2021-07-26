<?php


namespace App\Security;


use App\Repository\UserRepository;
use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\PassportInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;

class JwtAuthenticator extends AbstractAuthenticator
{

    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function supports(Request $request): ?bool
    {
        return $request->getPathInfo() !== '/login';
    }

    public function authenticate(Request $request): PassportInterface
    {
        $apiToken = str_replace('Bearer ', '', $request->headers->get('Authorization'));

        try {
            $credentials = JWT::decode($apiToken, 'SecretKey', ['HS256']);
        } catch (\Exception $exception) {
            throw new CustomUserMessageAuthenticationException('No API token provided');
        }

        if(!is_object($credentials) || !property_exists($credentials, 'username')){
            throw new CustomUserMessageAuthenticationException('No API token provided');
        }

        $username = $credentials->username;

        if (!$this->repository->findOneBy(['username'  => $username])){
            throw new CustomUserMessageAuthenticationException('No API token provided');
        }

        return new SelfValidatingPassport(new UserBadge($username));
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        return new JsonResponse(['erro' => 'Falha na autenticação 2'], Response::HTTP_UNAUTHORIZED);
    }
}