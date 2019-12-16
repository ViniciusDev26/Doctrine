<?php
use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$classAluno = Aluno::class;
$dql = "SELECT COUNT(a) FROM $classAluno a";
$query = $entityManager->createQuery($dql);
$contador_aluno = $query->getSingleScalarResult();


echo "Total Alunos: " . $contador_aluno . "\n";