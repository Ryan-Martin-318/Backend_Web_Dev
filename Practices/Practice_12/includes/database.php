<?php
// TODO 1: Replace the three hard-coded login lines below with the shared config
//         file (see the lesson steps), then delete those three lines.
$dsn = 'mysql:host=localhost;dbname=movie_favorites';
$username = 'root';
$password = '';

$db = new PDO($dsn, $username, $password, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    // Rows come back keyed by column name, such as $movie['title'].
]);
