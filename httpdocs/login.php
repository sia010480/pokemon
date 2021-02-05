<?php
require __DIR__ . "/../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Ioser\PMS\ORM\Account;

session_start();
$config = include __DIR__ . "/../config/local.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$metadataConfig = Setup::createAnnotationMetadataConfiguration($config["doctrine"]["metadataConfigPaths"], $config["doctrine"]["isDevMode"], null, null, false);

// obtaining the entity manager
$entityManager = EntityManager::create($config["db"]["pokemon"], $metadataConfig);

$accounts = $entityManager->getRepository(Account::class)->findBy(["loginName" => filter_input(INPUT_POST, "loginName")]);

for ($j = 0; $j < count($accounts); ++$j)
{
    $account = $accounts[$j];
    
    if ($account->authenticate(filter_input(INPUT_POST, "password")))
    {
        echo json_encode(["success" => true]);
        $_SESSION["accountId"] = $account->getId();
        exit;
    }
}

echo json_encode(["success" => false]);