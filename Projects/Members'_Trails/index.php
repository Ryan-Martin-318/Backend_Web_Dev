<?php
    require __DIR__ . '/includes/includes.php';
    $dsn = 'mysql:host=localhost;dbname=trail_guide';
    $Username = '';
    $Password = '';
    $message = '';
    $stored = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Username = trim($_POST['Username'] ?? '');
        $Password = $_POST['Password'] ?? '';
    }

    if ($Username === '' || $Password === '') {
        $message = 'Enter a username and a password.';
    } else {
        $stored = password_hash($Password, PASSWORD_DEFAULT);

        try {
            addUser($db, $Username, $stored);
        } catch (PDOException $e) {
            $message = 'That username is already taken.';
            $stored = '';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Registration</title>
    </head>
    <body style="background-color: darkslategray;">
        <?php getNavbar('User Registration'); ?>
        <div class="card" style="margin-right: auto; margin-left: auto; margin-top: 10px; margin-bottom: 10px; max-width: 75%; padding: 10px;">
            <form method="POST">
                <label class="form-label" for="Username">Username</label>
                <input class="form-control" type="text" id="Username" name="Username" value="<?= htmlspecialchars($Username) ?>">
                <label class="form-label" for="Password">Password</label>
                <input class="form-control" type="text" id="Password" name="Password" value="<?= htmlspecialchars($Password) ?>">
                <input class="btn btn-primary mb-3" style="margin-top: 10px;" type="submit" value="Register User">
            </form>
        </div>
        <?php if ($message !== '') { ?>
            <div class="alert alert-danger" role="alert" style="margin-right: auto; margin-left: auto; margin-top: 10px; margin-bottom: 10px; max-width: 25%; text-align: center;">
                <?php echo htmlspecialchars($message) ?>
            </div>
        <?php } ?>
        <?php if ($stored !== '') { ?>
            <div class="alert alert-success" role="alert" style="margin-right: auto; margin-left: auto; margin-top: 10px; margin-bottom: 10px; max-width: 25%; text-align: center;">
                <strong>User Registered!</strong>
            </div>
            <table class="table table-primary table-striped" style="margin-top: 20px; width: 50%; margin-left: auto; margin-right: auto; border: 2px solid white;">
                <tr>
                    <th>Username</th>
                    <td><?= htmlspecialchars($Username) ?></td>
                </tr>
                <tr>
                    <th>Password typed</th>
                    <td><?= htmlspecialchars($Password) ?></td>
                </tr>
                <tr>
                    <th>Value stored</th>
                    <td><code><?= htmlspecialchars($stored) ?></code></td>
                </tr>
            </table>
        <?php } ?>
    </body>
</html>