<?php

namespace Alura\Doctrine\Entity;

/**
 * @Entity
 */
class Aluno
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @column(type="string")
     */
    private $nome;

    public function toArray() : array
    {
        return[
            "id" -> $this->id,
            "nome" -> $this->nome
        ];
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setNome(string $nome) : self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getNome() : string
    {
        return $this->nome;
    }
}