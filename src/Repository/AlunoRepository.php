<?php

namespace Alura\Doctrine\Repository;

use Alura\Doctrine\Entity\Aluno;
use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository
{
    public function buscarCursosPorAluno()
    {
        $query = $this->createQueryBuilder('a')
        ->leftjoin('a.telefones', 't')
        ->leftjoin('a.cursos', 'c')
        ->addSelect('t')
        ->addSelect('c')
        ->getQuery();

        return $query->getResult();
    }
}