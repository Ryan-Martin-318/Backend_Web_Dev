<?php
    $books = [
        ['B101', 'Learning PHP', '24.95'],
        ['B102', 'Design, Build, Test', '19.50'],
        ['B103', 'Web Basics', '15.00'],
    ];

    $file = fopen("books.csv", "w");
    foreach ($books as $book) {
        fputcsv($file, $book);
    }

    fclose($file);
    $file = fopen("books.csv","r");
    foreach ($books as $book) {
        echo $book[0] . ", ". $book[1] .", ". $book[2];
    }
    fclose($file);
?>