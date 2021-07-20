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

class MedicoController extends BaseController
{
    public function __construct(EntityManagerInterface $entityManager, MedicoFactory $medicoFactory, MedicoRepository $medicoRepository)
    {
        parent::__construct($entityManager, $medicoRepository, $medicoFactory);
    }

    /**
     * @Route("/especialidades/{especialidadeId}/medicos", methods="GET")
     */
    public function buscarMedicoPorEspecialidade(int $especialidadeId): Response
    {
        $medicos = $this->medicoRepository->findBy([
            'especialidade' => $especialidadeId
        ]);
        return new JsonResponse($medicos);
    }

    public function atualizarEntidade($entidadeExistente, $entidadeEnviada)
    {
        $entidadeExistente->setNome($entidadeEnviada->getNome());
        $entidadeExistente->setCrm($entidadeEnviada->getCrm());
        $entidadeExistente->setEspecialidade($entidadeEnviada->getEspecialidade());
    }
}