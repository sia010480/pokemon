<?php
namespace Ioser\pokemon\Controller;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ioser\pokemon\ORM\Pokemon;

class PokemonApi {
    
    public function getPokemonDetails(Request $request)
    {
        $result = [];
        require_once __DIR__ . "/../../vendor/autoload.php";
        
        $config = include __DIR__ . "/../../config/local.php";

        // Create a simple "default" Doctrine ORM configuration for Annotations
        $metadataConfig = Setup::createAnnotationMetadataConfiguration($config["doctrine"]["metadataConfigPaths"], $config["doctrine"]["isDevMode"], null, null, false);

        // obtaining the entity manager
        $entityManager = EntityManager::create($config["db"]["pokemon"], $metadataConfig);
        
        $pokemon = $entityManager->getRepository(Pokemon::class)->findOneBy(array('name' => $request->get("pokemonName")));
        
        if ($pokemon !== null)
        {
                    $result = [
                        "name" => $pokemon->getName(),
                        "description" => $pokemon->getDescription()
                    ];
        } else
            {
                $result = [
                    "name" => $request->get("pokemonName"),
                    "error" => "Didn't find any description"
                ];
            }

        return new Response(\json_encode($result));
    }
}
