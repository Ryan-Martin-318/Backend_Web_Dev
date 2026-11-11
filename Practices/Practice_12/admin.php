<?php
require __DIR__ . '/includes/database.php';
require __DIR__ . '/includes/db-functions.php';

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
    <p><a href="login.php">Log in</a> · <a href="movies.php">See the movies</a></p>

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