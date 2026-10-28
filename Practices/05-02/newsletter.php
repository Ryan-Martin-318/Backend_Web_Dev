<?php
// Initialize $errors, $user, and $email.
$errors = [];
$user = '';
$email = '';

// On POST:
// 1. Retrieve the raw user and email strings with filter_input().
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = filter_input(INPUT_POST, 'user');
    $email = filter_input(INPUT_POST, 'email');
    var_dump($_POST);
}
// 2. Validate the username.
if ($user === null || trim($user) === '') {
    $errors['user'] = 'Username is required.';
}
if ($email === null || trim($email) === '') {
    $errors['email'] = 'Email is required.';
}else {
    $emailResult = filter_input(
        INPUT_POST,
        'email',
        FILTER_VALIDATE_EMAIL
    );

    if ($emailResult === false) {
        $errors['email'] = 'Enter a valid email address.';
    }
}print_r($errors);
// 3. Observe and test the FILTER_VALIDATE_EMAIL result.

// 4. Redirect only when no errors remain.
if (empty($errors)) {
    header('Location: success.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Newsletter</title>
    <?php require __DIR__ . '/includes/bootstrapcdnlinks.php'; ?>
</head>

<body class="p-3">
    <?php require __DIR__ . '/includes/navigation.php'; ?>

    <main class="container" style="max-width: 760px;">
        <h1>Newsletter</h1>


        <!-- Display a plain validation-error list here before styling it. -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <h2>Please correct the following</h2>
                <ul>
                    <?php foreach ($errors as $message): ?>
                        <li><?php echo ($message); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="newsletter.php" method="post" novalidate>
            <div class="mb-3">
                <label class="form-label" for="user">Username</label>

                <!-- Add the sticky value after its purpose is demonstrated. -->
                <input class="form-control" type="text" id="user" name="user" value="<?php echo htmlspecialchars($user); ?>">

                <!-- Add validation error response -->
                <?php if (isset($errors['user'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $errors['user']; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <!-- Add the sticky value after its purpose is demonstrated. -->
                <input class="form-control" type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">

                <!-- Add validation error response -->
                <?php if (isset($errors['email'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $errors['email']; ?>
                    </div>
                <?php endif; ?>
            </div>

            <button class="btn btn-primary" type="submit">Subscribe</button>
        </form>
    </main>
</body>

</html>