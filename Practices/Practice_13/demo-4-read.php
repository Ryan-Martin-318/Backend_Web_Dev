<?php
session_start();

// ?? supplies a default when the key was never stored (no warning).
$nickname = $_SESSION['nickname'] ?? null;
$visits = $_SESSION['visits'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo 4: read a value</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Demo 4: read a value on another page</h1>

    <?php if ($nickname !== null): ?>
        <p>Nickname in the session: <strong><?= htmlspecialchars($nickname) ?></strong></p>
    <?php else: ?>
        <p class="message">No nickname is stored in the session.</p>
    <?php endif; ?>

    <p>Counter from demo 2: <?= $visits ?></p>

    <p><a href="demo-3-store.php">Store a nickname</a> · <a href="demo-5-remove-one.php">Remove it</a> · <a href="index.html">All demos</a></p>
</body>
</html>
