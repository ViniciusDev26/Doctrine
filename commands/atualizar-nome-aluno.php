<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
// $alunoRepository = $entityManager->getRepository(Aluno::class);

$id = $argv[1];
$novoNome = $argv[2];

$aluno = $entityManager->find(Aluno::class, $id);

if(!isset($aluno)){
    echo "aluno não encontrado \n";
    return;
}

$aluno->setNome($novoNome);

$entityManager->merge($aluno);
$entityManager->flush();