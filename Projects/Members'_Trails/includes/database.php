<?php
$dsn = 'mysql:host=localhost;dbname=trail_guide';
$username = 'root';
$password = '';

$config = require dirname($_SERVER['DOCUMENT_ROOT']) . '/config/db-config.php';

$dsn = 'mysql:host=' . $config['host'] . ';dbname=trail_guide';

$db = new PDO($dsn, $config['user'], $config['password'], [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);