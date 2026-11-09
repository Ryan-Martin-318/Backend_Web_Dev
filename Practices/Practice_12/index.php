<?php
require __DIR__ . '/includes/database.php';
require __DIR__ . '/includes/db-functions.php';

$username = '';
$password = '';
$stored = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $message = 'Enter a username and a password.';
    } else {
        // TODO 2: The password is stored exactly as typed. Turn it into a
        //         one-way hash with password_hash() and store the hash instead.
        $stored = password_hash($password, PASSWORD_DEFAULT);

        try {
            addUser($db, $username, $stored);
        } catch (PDOException $e) {
            $message = 'That username is already taken.';
            $stored = '';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Register a user</h1>
    <p><a href="movies.php">See the movies</a></p>

    <?php if ($message !== ''): ?>
        <p class="message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="index.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>">

        <label for="password">Password</label>
        <input type="text" id="password" name="password">

        <p><button type="submit">Register</button></p>
    </form>

    <?php if ($stored !== ''): ?>
        <h2>Saved to the database</h2>
        <table>
            <tr><th>Username</th><td><?= htmlspecialchars($username) ?></td></tr>
            <tr><th>Password typed</th><td><?= htmlspecialchars($password) ?></td></tr>
            <tr><th>Value stored</th><td><code><?= htmlspecialchars($stored) ?></code></td></tr>
        </table>
    <?php endif; ?>
</body>
</html>
