<?php


namespace App\Helper;

use App\Entity\Especialidade;

class EspecialidadeFactory implements EntityFactoryInterface
{
    public function criar(string $bodyRequest)
    {
        $json = json_decode($bodyRequest);

        $this->verificarTodasAsPropriedas($json);

        $especialidade = new Especialidade();
        $especialidade->setDescricao($json->descricao);
        return $especialidade;
    }

    /**
     * @param $json
     * @throws FactoryException
     */
    public function verificarTodasAsPropriedas($json): void
    {
        if (!property_exists($json, 'descricao')) {
            throw new FactoryException('Especialidade precisa de descricao');
        }
    }
}