<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

$dql = "SELECT aluno FROM Alura\\Doctrine\\Entity\\Aluno aluno ORDER BY aluno.id";
$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();

foreach($alunoList as $aluno){
    $telefones = $aluno
    ->getTelefones()
    ->map(function(Telefone $telefone){
        return $telefone->getNumero();
    })
    ->toArray();
    echo $aluno->getId();
    echo " - ";
    echo $aluno->getNome();
    echo "\n";
    echo "telefones: " . implode(', ', $telefones);
    echo "\n\n";
}