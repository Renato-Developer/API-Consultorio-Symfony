<?php


namespace App\Controller;

use App\Entity\Especialidade;
use App\Entity\Medico;
use App\Helper\ExtratorDeDadosDoRequest;
use App\Helper\MedicoFactory;
use App\Repository\EspecialidadeRepository;
use App\Repository\MedicoRepository;
use Doctrine\ORM\EntityManagerInterface;
use http\Exception\InvalidArgumentException;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedicoController extends BaseController
{
    public function __construct(
        CacheItemPoolInterface $cache,
        EntityManagerInterface $entityManager,
        MedicoFactory $medicoFactory,
        MedicoRepository $medicoRepository,
        ExtratorDeDadosDoRequest $extratorDeDadosDoRequest
    ) {
        parent::__construct(
            $cache,
            $entityManager,
            $medicoRepository,
            $medicoFactory,
            $extratorDeDadosDoRequest
        );
    }

    public function buscarMedicoPorEspecialidade(int $especialidadeId): Response
    {
        $medicos = $this->repository->findBy([
            'especialidade' => $especialidadeId
        ]);
        return new JsonResponse($medicos);
    }

    public function atualizarEntidade($id, $entidadeEnviada)
    {
        $entidadeExistente = $this->repository->find($id);

        if (is_null($entidadeExistente)){
            throw new InvalidArgumentException();
        }

        $entidadeExistente->setNome($entidadeEnviada->getNome());
        $entidadeExistente->setCrm($entidadeEnviada->getCrm());
        $entidadeExistente->setEspecialidade($entidadeEnviada->getEspecialidade());

        return $entidadeExistente;
    }

    public function cachePrefix(): string
    {
        return 'medico_';
    }
}