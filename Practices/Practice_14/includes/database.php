<?php
// The login lives in one file outside htdocs, shared by every project.
// $_SERVER['DOCUMENT_ROOT'] is the htdocs folder; dirname() steps up one level.
$config = require dirname($_SERVER['DOCUMENT_ROOT']) . '/config/db-config.php';

$dsn = 'mysql:host=' . $config['host'] . ';dbname=movie_favorites';

$db = new PDO($dsn, $config['user'], $config['password'], [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    // Rows come back keyed by column name, such as $movie['title'].
]);
