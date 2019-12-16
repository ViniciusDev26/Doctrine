<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$classeAluno = Aluno::class;
$dql = "SELECT a, t, c from $classeAluno a JOIN a.telefones t JOIN a.cursos c";
$query = $entityManager->createQuery($dql);
$alunos = $query->getResult();

foreach($alunos as $aluno){
    $telefones = $aluno
    ->getTelefones()
    ->map(function(Telefone $telefone){
        return $telefone->getNumero();
    })
    ->toArray();

    echo "ID: {$aluno->getId()}\n";
    echo "Nome: {$aluno->getNome()}\n";
    echo "Telefones: " . implode(', ', $telefones) . "\n";

    $cursos = $aluno->getCursos();
    foreach($cursos as $curso){
        echo "\t ID Curso: {$curso->getId()}\n";
        echo "\t Curso: {$curso->getNome()}\n";
        echo "\n";
    }
    echo "\n";

}