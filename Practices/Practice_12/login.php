<?php
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

        // TODO 2: Right now any password is accepted for an existing username.
        //         Also require password_verify($password, $user['password_hash'])
        //         (it hashes the typed password with the salt and cost stored in
        //         the saved hash, then compares the two).
        if ($user) {
            header('Location: admin.php');
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
    <p><a href="index.php">Register a user</a> · <a href="movies.php">See the movies</a></p>

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