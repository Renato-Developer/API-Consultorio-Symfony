<?php


namespace App\Helper;


use App\Entity\Especialidade;

class EspecialidadeFactory implements EntityFactoryInterface
{
    public function criar(string $bodyRequest)
    {
        $json = json_decode($bodyRequest);
        $especialidade = new Especialidade();
        $especialidade->setDescricao($json->descricao);
        return $especialidade;
    }
}