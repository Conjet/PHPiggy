<?php

$driver = 'mysql';
$config = http_build_query([
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'phpiggy'
]);

$dsn = "{$driver}:{$config}";

echo $dsn;
