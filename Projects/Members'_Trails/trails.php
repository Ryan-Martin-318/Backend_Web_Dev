<?php
    declare(strict_types=1);
    function getTrailByDifficulty($difficulty) {
        $dsn = 'mysql:host=localhost;dbname=my_guitar_shop2;charset=utf8mb4';
        $username = 'root';
        $password = '';
        try {
            new PDO($dsn, $username, $password);
        } catch (PDOException $e){
            echo '<p>Error: ' . $e->getMessage() . '</p>';
            return NULL;
        }
        $sql = 'SELECT t.trail_id, t.trail_name, t.difficulty_id
                FROM trails AS t
                WHERE t.difficulty = :difficulty';
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trails</title>
</head>
<body>
    
</body>
</html>