<?php

require __DIR__ . "/../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Ioser\pokemon\ORM\Account;

if ($argc < 3)
{
    echo "Parameters: [login name] [password]\n";
    die;
}

$config = include __DIR__ . "/../config/local.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$metadataConfig = Setup::createAnnotationMetadataConfiguration($config["doctrine"]["metadataConfigPaths"], $config["doctrine"]["isDevMode"], null, null, false);

// obtaining the entity manager
$entityManager = EntityManager::create($config["db"]["pokemon"], $metadataConfig);

$user = new Account();

$user->setLoginName($argv[1]);
$user->setPassword($argv[2]);

$entityManager->persist($user);
$entityManager->flush();




