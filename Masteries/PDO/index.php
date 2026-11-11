<?php
    declare(strict_types=1);
    $dsn = 'mysql:host=localhost;dbname=cis239_farm;charset=utf8mb4';
    $username = 'root';
    $password = '';
    try {
        $db = new PDO($dsn, $username, $password);
    }catch(PDOException $e) {
        echo ''. $e->getMessage();
    }
    $sql = 'SELECT animal, quote
            FROM farm_animals';
    $statement = $db->query($sql);
    $rows = $statement->fetchAll();
    foreach($rows as $row) {
        echo $row[0] . ' - ' . $row[1] . '<br>';
    }