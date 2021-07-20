<?php


namespace App\Helper;

use App\Entity\Medico;
use App\Repository\EspecialidadeRepository;
use Doctrine\ORM\EntityManagerInterface;

class MedicoFactory implements EntityFactoryInterface
{
    private EspecialidadeRepository $especialidadeRepository;

    public function __construct(EspecialidadeRepository $especialidadeRepository)
    {
        $this->especialidadeRepository = $especialidadeRepository;
    }

    public function criar(string $bodyRequest)
    {
        $json = json_decode($bodyRequest);
        $especialidade = $this->especialidadeRepository->find($json->especialidadeId);
        return new Medico($json->nome, $json->crm, $especialidade);
    }
}