<?php
// Shown by requireAdmin() when a logged-in user is not an admin.
// The caller has already started the session and sent the 403 status.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Not allowed</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Not allowed</h1>
    <?php require __DIR__ . '/includes/nav.php'; ?>

    <p class="message">This page is for admins only.</p>
</body>
</html>
