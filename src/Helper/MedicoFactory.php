<?php


namespace App\Helper;

use App\Entity\Medico;

class MedicoFactory
{
    public static function criarMedico(string $json): Medico
    {
        $json = json_decode($json);
        return new Medico($json->nome, $json->crm);
    }
}