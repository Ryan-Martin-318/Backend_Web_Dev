<?php
session_start();

require __DIR__ . '/includes/auth.php';

// TODO 3: only a logged-in user may see this page.
requireLogin();

// null when nobody has logged in (no warning for a missing key).
$username = $_SESSION['username'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome</h1>
    <?php require __DIR__ . '/includes/nav.php'; ?>

    <?php if ($username !== null): ?>
        <p>Logged in as <strong><?= htmlspecialchars($username) ?></strong>.</p>
    <?php else: ?>
        <p class="message">Not logged in.</p>
    <?php endif; ?>
</body>
</html>
