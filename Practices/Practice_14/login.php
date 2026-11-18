<?php
// The session must start before anything is sent to the browser.
session_start();

require __DIR__ . '/includes/database.php';
require __DIR__ . '/includes/db-functions.php';

$username = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $message = 'Enter a username and a password.';
    } else {
        $user = getUserByUsername($db, $username);

        // password_verify() hashes the typed password with the salt and cost
        // stored in the saved hash, then compares the two.
        if ($user && password_verify($password, $user['password_hash'])) {
            // TODO 1: give the visitor a new session id now that the login succeeded.

            // Remember who logged in. These values stay on the server.
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            // TODO 6b: store whether this user is an admin (true or false).
            $_SESSION['is_admin'] = (bool) $user['is_admin'];
            header('Location: welcome.php');
            exit;
        }

        // The same message for a wrong username and a wrong password.
        $message = 'Username or password is incorrect.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Log in</h1>
    <?php require __DIR__ . '/includes/nav.php'; ?>

    <?php if ($message !== ''): ?>
        <p class="message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>">

        <label for="password">Password</label>
        <input type="text" id="password" name="password">

        <p><button type="submit">Log in</button></p>
    </form>
</body>
</html>
