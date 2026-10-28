<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Demonstration</title>
    <?php include 'includes/bootstrapcdnlinks.php'; ?>
</head>
<body class="p-3">
    <?php include 'includes/navigation.php'; ?>

    <main class="container">
        <h1>Redirect Received</h1>
        <p>The browser arrived here after receiving a redirect from <code>subscribe.php</code>.</p>
        <a class="btn btn-primary" href="subscribe.php?access=allowed">Continue to Subscribe</a>
    </main>
</body>
</html>
