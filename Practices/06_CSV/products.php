<?php 
    //$data[0][1]
    $data = array(
        ['GOOG', 'Google Inc.', '800'],
        ['AAPL', 'Apple Inc.', '500'],
        ['AMZN', 'Amazon.com Inc.', '250'],
        ['YHOO', 'Yahoo! Inc.', '250'],
        ['FB', 'Facebook, Inc.', '30'],
    );  

    $filename = "stock.csv";
    $file = fopen($filename, 'w');
    if($file === false){
        die("error opening the file " . $filename);
    }
    foreach($data as $row){
        fputcsv($file, $row);
    }
    fclose($file);
?>