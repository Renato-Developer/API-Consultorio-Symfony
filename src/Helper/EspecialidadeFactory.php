<?php


namespace App\Helper;

use App\Entity\Especialidade;

class EspecialidadeFactory implements EntityFactoryInterface
{
    public function criar(string $bodyRequest)
    {
        $json = json_decode($bodyRequest);

        if (!property_exists($json, 'descricao')) {
            throw new FactoryException('Especialidade precisa de descricao');
        }

        $especialidade = new Especialidade();
        $especialidade->setDescricao($json->descricao);
        return $especialidade;
    }
}