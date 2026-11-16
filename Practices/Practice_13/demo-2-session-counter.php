<?php
session_start();   // must run before anything is sent to the browser

// Read the stored count (0 the first time), add one, store it again.
$_SESSION['visits'] = ($_SESSION['visits'] ?? 0) + 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo 2: session counter</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Demo 2: a session counter</h1>
    <p>Visits: <?= $_SESSION['visits'] ?></p>
    <p>Session id (the value of the PHPSESSID cookie): <code><?= htmlspecialchars(session_id()) ?></code></p>
    <p><a href="demo-2-session-counter.php">Reload this page</a> · <a href="index.html">All demos</a></p>
</body>
</html>
