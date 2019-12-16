<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="Alura\Doctrine\Repository\AlunoRepository")
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

    /**
     * @OneToMany(targetEntity="Telefone", mappedBy="aluno", cascade={"remove","persist"})
     */
    private $telefones;

    /**
     * @ManyToMany(targetEntity="Curso", mappedBy="alunos")
     */
    private $cursos;

    public function __construct(){
        $this->telefones = new ArrayCollection();
        $this->cursos = new ArrayCollection();
    }

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

    public function addTelefone(Telefone $telefone): self
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        return $this;
    }

    public function getTelefones(): Collection
    {
        return $this->telefones;
    }

    public function addCurso(Curso $curso): self
    {
        if($this->cursos->contains($curso)){
            return $this;
        }

        $this->cursos->add($curso);
        $curso->addAluno($this);

        return $this;
    }

    public function getCursos(): Collection
    {
        return $this->cursos;
    }
}