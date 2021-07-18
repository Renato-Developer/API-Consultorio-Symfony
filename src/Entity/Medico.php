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

    /**
     * @ORM\ManyToOne(targetEntity=Especialidade::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $especialidade;

    public function __construct(string $nome , string $crm)
    {

        $this->nome = $nome;
        $this->crm = $crm;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setCrm(int $crm): void
    {
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

    public function getEspecialidade(): ?Especialidade
    {
        return $this->especialidade;
    }

    public function setEspecialidade(?Especialidade $especialidade): self
    {
        $this->especialidade = $especialidade;

        return $this;
    }
}