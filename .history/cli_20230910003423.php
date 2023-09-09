<?php

include __DIR__ . "/src/Framework/Database.php";

use Framework\Database;
use App\Config\Paths;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(Paths::ROOT);
$dotenv->load();

$db = new Database(
    $_ENV['DB_DRIVER'],
    [
        'host' => $_ENV['DB_DRIVER'],
        'port' => $_ENV['DB_PORT'],
        'dbname' => $_ENV['DB_NAME']
    ],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS']
);

$sqlFile = file_get_contents("./database.sql");
echo $sqlFile;
