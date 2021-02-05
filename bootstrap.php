<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$config = include __DIR__ . "/config/local.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$metadataConfig = Setup::createAnnotationMetadataConfiguration($config["doctrine"]["metadataConfigPaths"], $config["doctrine"]["isDevMode"], null, null, false);

// obtaining the entity manager
$entityManager = EntityManager::create($config["db"]["pokemon"], $metadataConfig);
//$entityManager->getEventManager()->addEventSubscriber(new ORMSchemaEventSubscriber());
