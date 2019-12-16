<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . '/src'],true
        );
        $connectionParams = array(
            'dbname' => 'curso_doctrine',
            'user' => 'postgres',
            'password' => 'asdasd',
            'host' => 'localhost',
            'driver' => 'pdo_pgsql',
        );

        // $connectionParams = array(
        //     'driver' => 'pdo_sqlite',
        //     'path' => $rootDir . '/var/data/banco.sqlite'
        // );

        // $connectionParams = array(
        //     'driver' => 'pdo_mysql',
        //     'host' => 'localhost',
        //     'dbname' => 'curso_doctrine',
        //     'user' => 'root',
        //     'password' => ''
        // );
        return EntityManager::create($connectionParams, $config);
    }
}