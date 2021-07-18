<?php

namespace App\Controller;

use App\Entity\Especialidade;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspecialidadesController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
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

        return new Response('', 200);
    }
}
