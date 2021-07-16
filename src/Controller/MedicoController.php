<?php


namespace App\Controller;

use App\Entity\Medico;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use http\Exception\InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedicoController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/medicos", methods="POST")
     */
    public function novoMedico(Request $request): Response
    {
        $body = $request->getContent();
        $jsonBody = json_decode($body);

        $medico = new Medico($jsonBody->nome, $jsonBody->crm);

        $this->entityManager->persist($medico);
        $this->entityManager->flush();

        return new JsonResponse($medico);
    }

    /**
     * @Route("/medicos", methods="GET")
     */
    public function buscarMedicos(): Response
    {
        $medicosRepository = $this
            ->getDoctrine()
            ->getRepository(Medico::class);

        $medicos = $medicosRepository->findAll();

        return new JsonResponse($medicos);
    }

    /**
     * @Route("/medicos/{id}", methods="GET")
     */
    public function medicoPorId(Request $request): Response
    {
        $id = $request->get('id');
        $medicosRepository = $this
            ->getDoctrine()
            ->getRepository(Medico::class);

        $medico = $medicosRepository->find($id);

        $codigoRetorno = is_null($medico) ? Response::HTTP_NO_CONTENT : 200;

        return new JsonResponse($medico, $codigoRetorno);
    }
}