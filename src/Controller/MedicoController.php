<?php


namespace App\Controller;

use App\Entity\Especialidade;
use App\Entity\Medico;
use App\Helper\MedicoFactory;
use App\Repository\EspecialidadeRepository;
use App\Repository\MedicoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedicoController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private MedicoFactory $medicoFactory;
    private MedicoRepository $medicoRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        MedicoFactory $medicoFactory,
        MedicoRepository $medicoRepository
    )
    {
        $this->entityManager = $entityManager;
        $this->medicoFactory = $medicoFactory;
        $this->medicoRepository = $medicoRepository;
    }

    /**
     * @Route("/medicos", methods="POST")
     */
    public function novoMedico(Request $request): Response
    {
        $body = $request->getContent();
        $medico = $this->medicoFactory->criarMedico($body);

        $this->entityManager->persist($medico);
        $this->entityManager->flush();

        return new JsonResponse($medico);
    }

    /**
     * @Route("/medicos", methods="GET")
     */
    public function buscarMedicos(): Response
    {
        $medicos = $this->medicoRepository->findAll();
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
        $body = $request->getContent();
        $medicoEnviado = $this->medicoFactory->criarMedico($body);

        $medico = $this->buscaMedicoPorId($id);
        if (is_null($medico)) {
            return new Response('', Response::HTTP_NOT_FOUND);
        }

        $medico->setNome($medicoEnviado->getNome());
        $medico->setCrm($medicoEnviado->getCrm());
        $medico->setEspecialidade($medicoEnviado->getEspecialidade());

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
        /**@var Medico $medico*/
        $medico = $this->medicoRepository->find($id);
        return $medico;
    }
}