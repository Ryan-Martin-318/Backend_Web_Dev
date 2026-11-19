<?php
    require __DIR__ . '/includes/includes.php';
    $Username = '';
    $message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Username = trim($_POST['Username'] ?? '');
        $Password = $_POST['Password'] ?? '';

        if ($Username === '' || $Password === '') {
            $message = 'Enter a username and a password.';
        } else {
            $user = getUserByUsername($db, $Username);
            if ($user && password_verify($Password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['is_admin'] = (bool) $user['is_admin'];
                header('Location: trails.php');
                exit;
            }
            $message = 'Username or password is incorrect.';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Login</title>
    </head>
    <body  style="background-color: darkslategray;">
        <?php getNavbar('User Login'); ?>
            <div class="card" style="margin-right: auto; margin-left: auto; margin-top: 10px; margin-bottom: 10px; max-width: 75%; padding: 10px;">
                <form method="POST">
                    <label class="form-label" for="Username">Username</label>
                    <input class="form-control" type="text" id="Username" name="Username">
                    <label class="form-label" for="Password">Password</label>
                    <input class="form-control" type="text" id="Password" name="Password">
                    <input class="btn btn-primary mb-3" style="margin-top: 10px;" type="submit" value="Login">
                </form>
            </div>
        <?php if ($message !== '') { ?>
            <div class="alert alert-danger" role="alert" style="margin-right: auto; margin-left: auto; margin-top: 10px; margin-bottom: 10px; max-width: 25%; text-align: center;">
                <?php echo htmlspecialchars($message) ?>
            </div>
        <?php } ?>
    </body>
</html>