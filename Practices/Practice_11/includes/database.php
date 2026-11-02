<?php
$dsn = 'mysql:host=localhost;dbname=music_favorites';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        // Makes fetch() and fetchAll() return rows keyed by column name,
        // such as $song['title'], without specifying PDO::FETCH_ASSOC each time.
    ]);
} catch (PDOException $e) {
    $error = $e->getMessage();
    echo "Database connection error: $error";
    exit;
}
