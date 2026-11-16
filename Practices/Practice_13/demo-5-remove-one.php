<?php
session_start();

// Remove one value. The rest of the session stays.
unset($_SESSION['nickname']);

$visits = $_SESSION['visits'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo 5: remove one value</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Demo 5: remove one value</h1>
    <p>The nickname is gone. The counter from demo 2 is still <?= $visits ?>.</p>
    <p><a href="demo-4-read.php">Check the nickname</a> · <a href="demo-6-clear-all.php">Clear everything</a> · <a href="index.html">All demos</a></p>
</body>
</html>
