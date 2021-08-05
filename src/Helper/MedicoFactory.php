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
        $this->VerificarTodasAsPropriedades($json);

        $especialidade = $this->especialidadeRepository->find($json->especialidadeId);
        return new Medico($json->nome, $json->crm, $especialidade);
    }

    /**
     * @param $json
     * @throws FactoryException
     */
    public function VerificarTodasAsPropriedades(object $json): void
    {
        if (
            !property_exists($json, 'nome') ||
            !property_exists($json, 'crm') ||
            !property_exists($json, 'especialidadeId')
        ) {
            throw new FactoryException('Erro na criação da entidade');
        }
    }
}