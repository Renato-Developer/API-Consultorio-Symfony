<?php

namespace App\Controller;

use App\Entity\Especialidade;
use App\Entity\Medico;
use App\Repository\EspecialidadeRepository;
use App\Repository\MedicoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspecialidadesController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private EspecialidadeRepository $especialidadeRepository;
    private MedicoRepository $medicoRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        EspecialidadeRepository $especialidadeRepository,
        MedicoRepository $medicoRepository
    )
    {
        $this->entityManager = $entityManager;
        $this->especialidadeRepository = $especialidadeRepository;
        $this->medicoRepository = $medicoRepository;
    }

    /**
     * @Route("/especialidades", methods="POST")
     */
    public function novaEspecialidade(Request $request): Response
    {
        $dados = $request->getContent();
        $json = json_decode($dados);

        $especialidade = new Especialidade();
        $especialidade->setDescricao($json->descricao);

        $this->entityManager->persist($especialidade);
        $this->entityManager->flush();

        return new JsonResponse($especialidade);
    }

    /**
     * @Route("/especialidades", methods="GET")
     */
    public function buscarEspecialidades(): Response
    {
        $especialidades = $this->especialidadeRepository->findAll();
        return new JsonResponse($especialidades);
    }

    /**
     * @Route("/especialidades/{id}", methods="GET")
     */
    public function especialidadePorId(int $id): Response
    {
        $especialidade = $this->buscarEspecialidadePorId($id);
        return new JsonResponse($especialidade);
    }

    /**
     * @Route("/especialidades/{id}", methods="PUT")
     */
    public function atualizarEspecialidade(int $id, Request $request): Response
    {
       $especialidade = $this->buscarEspecialidadePorId($id);

       $body = $request->getContent();
       $body = json_decode($body);
       $especialidade->setDescricao($body->descricao);

       $this->entityManager->flush();
       return new JsonResponse($especialidade);
    }

    /**
     * @Route("/especialidades/{id}", methods="DELETE")
     */
    public function removerEspecialidade(int $id): Response
    {
        $especialidade = $this->entityManager->getReference(Especialidade::class, $id);
        $this->entityManager->remove($especialidade);
        $this->entityManager->flush();
        return new JsonResponse('', Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/especialidades/{id}/medicos")
     */
    public function buscarMedicoPorEspecialidade(int $id): Response
    {
        $medicos = $this->medicoRepository->findBy([
            'especialidade' => $id
        ]);
        return new JsonResponse($medicos);
    }

    private function buscarEspecialidadePorId(int $id)
    {
        $especialidade = $this->especialidadeRepository->find($id);
        /**@var Especialidade $especialidade*/
        return $especialidade;
    }
}
