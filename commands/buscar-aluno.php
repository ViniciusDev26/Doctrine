<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

/** @var Aluno[] $alunoList*/
$alunoList = $alunoRepository->findAll();

foreach($alunoList as $aluno){
    echo $aluno->getId();
    echo "\n";
    echo $aluno->getNome();
    echo "\n\n";
}

$keisiane = $alunoRepository->find(9);
echo "\n\n";
echo $keisiane->getId() . " - ";
echo $keisiane->getNome();
echo "\n\n";

// findBy
$vinicius = $alunoRepository->findOneBy([
    "nome"=>"Carlos Vinicius"
]);

echo "\n\n";
echo $vinicius->getId() . " - ";
echo $vinicius->getNome();
echo "\n\n";