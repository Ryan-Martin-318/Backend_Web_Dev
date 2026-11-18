<?php
// The links at the top of every page. A page calls session_start() before it includes this file.

// TODO 5: set $loggedIn to true when the session holds a user id.
$loggedIn = isset($_SESSION['user_id']);

// TODO 8b: set $isAdmin from the value stored at login (false when it is missing).
$isAdmin = true;
?>
<nav>
    <a href="movies.php">Movies</a>
    <?php if ($loggedIn): ?>
        · <a href="welcome.php">Welcome</a>
        <?php if ($isAdmin): ?>
            · <a href="admin.php">Admin area</a>
        <?php endif; ?>
        · <a href="logout.php">Log out (<?= htmlspecialchars($_SESSION['username']) ?>)</a>
    <?php else: ?>
        · <a href="index.php">Register</a>
        · <a href="login.php">Log in</a>
    <?php endif; ?>
</nav>
