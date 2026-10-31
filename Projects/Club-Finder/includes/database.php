<?php
declare(strict_types=1);

$dsn = 'mysql:host=localhost;dbname=campus_clubs;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    error_log($e->getMessage());               // the real message goes to the log, for us
    exit('<p>Sorry, the website is unavailable right now.</p>');   // the visitor sees this
}
?>