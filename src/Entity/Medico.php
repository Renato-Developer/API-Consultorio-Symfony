<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Medico implements \JsonSerializable
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $nome;

    /**
     * @ORM\Column(type="integer")
     */
    private string $crm;

    public function __construct(string $nome , string $crm)
    {

        $this->nome = $nome;
        $this->crm = $crm;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            "nome" => $this->nome,
            "crm" => $this->crm
        ];
    }
}