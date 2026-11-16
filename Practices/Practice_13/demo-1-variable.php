<?php
// An ordinary variable is created fresh on every request.
$visits = 0;
$visits = $visits + 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo 1: variable</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Demo 1: an ordinary variable</h1>
    <p>Visits: <?= $visits ?></p>
    <p><a href="demo-1-variable.php">Reload this page</a> · <a href="index.html">All demos</a></p>
</body>
</html>
