<?php

namespace App\Controller;

use App\Entity\Especialidade;
use App\Helper\EspecialidadeFactory;
use App\Helper\ExtratorDeDadosDoRequest;
use App\Repository\EspecialidadeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspecialidadesController extends BaseController
{
    public function __construct(
        EntityManagerInterface $entityManager,
        EspecialidadeRepository $especialidadeRepository,
        EspecialidadeFactory $especialidadeFactory,
        ExtratorDeDadosDoRequest $extratorDeDadosDoRequest
    ) {
        parent::__construct(
            $entityManager,
            $especialidadeRepository,
            $especialidadeFactory,
            $extratorDeDadosDoRequest
        );
    }

    public function atualizarEntidade($entidadeExistente, $entidadeEnviada)
    {
        $entidadeExistente->setDescricao($entidadeEnviada->getDescricao());
    }
}
