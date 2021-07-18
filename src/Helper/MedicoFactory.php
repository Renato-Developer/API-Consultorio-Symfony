<?php


namespace App\Helper;

use App\Entity\Medico;
use App\Repository\EspecialidadeRepository;
use Doctrine\ORM\EntityManagerInterface;

class MedicoFactory
{
    private EspecialidadeRepository $especialidadeRepository;

    public function __construct(EspecialidadeRepository $especialidadeRepository)
    {
        $this->especialidadeRepository = $especialidadeRepository;
    }

    public function criarMedico(string $json): Medico
    {
        $json = json_decode($json);
        $especialidade = $this->especialidadeRepository->find($json->especialidadeId);
        return new Medico($json->nome, $json->crm, $especialidade);
    }
}