<?php

namespace App\Controller;

use App\Entity\Especialidade;
use App\Helper\EspecialidadeFactory;
use App\Helper\ExtratorDeDadosDoRequest;
use App\Repository\EspecialidadeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspecialidadesController extends BaseController
{
    public function __construct(
        LoggerInterface $logger,
        CacheItemPoolInterface $cache,
        EntityManagerInterface $entityManager,
        EspecialidadeRepository $especialidadeRepository,
        EspecialidadeFactory $especialidadeFactory,
        ExtratorDeDadosDoRequest $extratorDeDadosDoRequest
    ) {
        parent::__construct(
            $logger,
            $cache,
            $entityManager,
            $especialidadeRepository,
            $especialidadeFactory,
            $extratorDeDadosDoRequest
        );
    }

    public function atualizarEntidade($id, $entidadeEnviada)
    {
        $entidadeExistente = $this->repository->find($id);
        return $entidadeExistente->setDescricao($entidadeEnviada->getDescricao());
    }

    public function cachePrefix(): string
    {
        return 'especialidade_';
    }
}
