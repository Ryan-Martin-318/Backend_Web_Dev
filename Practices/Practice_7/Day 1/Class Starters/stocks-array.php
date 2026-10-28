<?php
// Week 7 Day 1 - The problem with arrays (from Week 6: aNewProducts.php)
// Run from the terminal: php stocks-array.php

$file = fopen(__DIR__ . '/stock.csv', 'r');
$stocks = [];

while (($stock = fgetcsv($file)) !== false) {
    $stocks[] = $stock;
}

fclose($file);

foreach ($stocks as $stock) {
    echo "$stock[0] which is $stock[1] priced at $$stock[2]\n";
}