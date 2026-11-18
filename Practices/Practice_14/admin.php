<?php
session_start();

require __DIR__ . '/includes/auth.php';
require __DIR__ . '/includes/database.php';
require __DIR__ . '/includes/db-functions.php';

// TODO 3: only a logged-in user may see this page.
// (TODO 8a changes this to an admin-only check.)
requireAdmin();

$users = getUsers($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin area</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Admin area</h1>
    <?php require __DIR__ . '/includes/nav.php'; ?>

    <h2>Registered users</h2>
    <table>
        <tr><th>ID</th><th>Username</th><th>Stored password value</th></tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['user_id']) ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><code><?= htmlspecialchars($user['password_hash']) ?></code></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
