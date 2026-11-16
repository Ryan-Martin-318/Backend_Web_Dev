<?php
session_start();

$_SESSION = []; // Empty the array for this request.



session_destroy(); // Delete the saved session data on the server.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo 6: clear the session</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Demo 6: clear the whole session</h1>
    <p>Every stored value is gone.</p>
    <p><a href="demo-4-read.php">Check demo 4</a> · <a href="demo-2-session-counter.php">Counter (starts over)</a> · <a href="index.html">All demos</a></p>
</body>

</html>