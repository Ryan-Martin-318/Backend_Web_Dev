<?php
    $file = fopen("stock.csv", 'r');
    $stocks = array();
    while (!feof($file)){
        $stock = fgetcsv($file);
        if ($stock === false) continue;
        $stocks[] = $stock;
    }
    // print_r($stocks);
    foreach ($stocks as $stock){
        echo("$stock[0] which is $stock[1] priced at $$stock[2]\n");
    }

    fclose($file);
?>