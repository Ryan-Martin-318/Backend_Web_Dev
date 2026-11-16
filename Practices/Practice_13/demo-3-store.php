<?php
session_start();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nickname = trim($_POST['nickname'] ?? '');

    if ($nickname !== '') {
        // Storing again with the same key replaces the old value.
        $_SESSION['nickname'] = $nickname;
        $message = "$_SESSION[nickname] stored in session";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo 3: store a value</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Demo 3: store a value</h1>

    <?php if ($message !== ''): ?>
        <p class="message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="demo-3-store.php" method="post">
        <label for="nickname">Nickname</label>
        <input type="text" id="nickname" name="nickname">
        <p><button type="submit">Store it</button></p>
    </form>

    <p><a href="demo-4-read.php">Read it on another page</a> · <a href="index.html">All demos</a></p>
</body>
</html>
