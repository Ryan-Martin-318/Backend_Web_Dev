<?php
    require __DIR__ . '/includes/database.php';
    require __DIR__ . '/includes/db-functions.php';
    $username = '';
    $password = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($username === '' || $password === '') {
            $message = 'Enter a username and a password.';
        }else {
            $user = getUserByUsername($db, $username);
        }
        if ($user) {
            header('Location: admin.php');
            exit;
        }
        $message = 'Username or password is incorrect.';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>">
        <label for="password">Password</label>
        <input type="text" id="password" name="password" value="<?= htmlspecialchars($password) ?>">
        <input type="submit" value="Login">
    </form>
</body>
</html>