<?php


namespace App\Entity;


class Medico
{
    private string $nome;
    private string $crm;

    public function __construct(string $nome , string $crm)
    {

        $this->nome = $nome;
        $this->crm = $crm;
    }

    public function getMedico(): array
    {
        $dados = [
            "nome" => $this->nome,
            "crm" => $this->crm
        ];

        return $dados;
    }
}