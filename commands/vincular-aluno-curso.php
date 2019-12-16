<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id_aluno = $argv[1];
$id_curso = $argv[2];

$aluno = $entityManager->find(Aluno::class, $id_aluno);
echo "aluno: " . $aluno->getNome();
echo "\n";
$curso = $entityManager->find(Curso::class, $id_curso);
echo "curso: " . $curso->getNome();
echo "\n";

$curso->addAluno($aluno);

$entityManager->flush();