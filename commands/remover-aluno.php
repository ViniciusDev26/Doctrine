<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entitymanager = $entityManagerFactory->getEntityManager();

for($i = 1; $i < $argc; $i++){
    $id = $argv[$i];
    $aluno = $entitymanager->find(Aluno::class, $id);

    if(!isset($aluno)){
        echo "Aluno Inexistente\n\n\n";
        return;
    }

    $entitymanager->remove($aluno);
}

$entitymanager->flush();