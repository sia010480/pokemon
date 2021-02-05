<?php

return [
    "db" => [
        "pokemon" => [
            "host" => "localhost",
            "dbname" => "pokemon",
            "user" => "adrian",
            "password" => "GoOIwYZjiMYR9yqi",
            "driver" => "pdo_mysql"
        ]
    ],
    "doctrine" => [
        "metadataConfigPaths" => [
            __DIR__ . "/../src/ORM"
        ],
        "isDevMode" => true
    ],
    "paths" => [
        "upload" => __DIR__ . "/../var/uploads"
    ]
];