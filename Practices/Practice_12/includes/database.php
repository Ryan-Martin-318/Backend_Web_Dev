<?php
// TODO 1: Replace the three hard-coded login lines below with the shared config
//         file (see the lesson steps), then delete those three lines.
// $dsn = 'mysql:host=localhost;dbname=movie_favorites';
// $username = 'root';
// $password = '';

$config = require dirname($_SERVER['DOCUMENT_ROOT']) . '/config/db-config.php';

$dsn = 'mysql:host=' . $config['host'] . ';dbname=movie_favorites';


$db = new PDO($dsn, $username, $password, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    // Rows come back keyed by column name, such as $movie['title'].
]);