<?php

require __DIR__ . "/../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Ioser\pokemon\ORM\Pokemon;

if ($argc < 3)
{
    echo "Parameters: [name] [description]\n";
    die;
}

$config = include __DIR__ . "/../config/local.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$metadataConfig = Setup::createAnnotationMetadataConfiguration($config["doctrine"]["metadataConfigPaths"], $config["doctrine"]["isDevMode"], null, null, false);

// obtaining the entity manager
$entityManager = EntityManager::create($config["db"]["pokemon"], $metadataConfig);

$pokemon = new Pokemon();

$pokemon->setName($argv[1]);
$pokemon->setDescription($argv[2]);

$entityManager->persist($pokemon);
$entityManager->flush();




