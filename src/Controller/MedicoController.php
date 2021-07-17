<?php


namespace App\Controller;

use App\Entity\Medico;
use App\Helper\MedicoFactory;
use Doctrine\ORM\EntityManagerInterface;
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
        $medico = MedicoFactory::criarMedico($body);

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
    public function medicoPorId(int $id): Response
    {
        $medico = $this->buscaMedicoPorId($id);
        $codigoRetorno = is_null($medico) ? Response::HTTP_NO_CONTENT : 200;

        return new JsonResponse($medico, $codigoRetorno);
    }

    /**
     * @Route("medicos/{id}", methods="PUT")
     */
    public function atualizarMedico(int $id, Request $request): Response
    {
        $medico = $this->buscaMedicoPorId($id);
        if (is_null($medico)) {
            return new Response('', Response::HTTP_NOT_FOUND);
        }

        $body = $request->getContent();
        $dadosEmJson = json_decode($body);

        $medico->setNome($dadosEmJson->nome);
        $medico->setCrm($dadosEmJson->crm);

        $this->entityManager->flush();

        return new JsonResponse($medico, 200);
    }

    /**
     * @Route("medicos/{id}", methods="DELETE")
     */
    public function removerMedico(int $id): Response
    {
        $medico = $this->buscaMedicoPorId($id);

        if (is_null($medico)) {
            return new Response('', Response::HTTP_NOT_FOUND);
        }

        $this->entityManager->remove($medico);
        $this->entityManager->flush();

        return new Response('', 200);
    }

    private function buscaMedicoPorId(int $id): Medico
    {
        $medicosRepository = $this
            ->getDoctrine()
            ->getRepository(Medico::class);

        return $medicosRepository->find($id);
    }
}