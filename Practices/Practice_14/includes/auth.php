<?php
// Access checks for pages that need a logged-in user.
// A page calls session_start() before it calls these functions.

// Send a visitor who is not logged in to the login page.
function requireLogin(): void
{
    // TODO 2: when the session has no user id, redirect to login.php and stop the script.
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
}

// Allow only an admin. A logged-in user who is not an admin gets a 403 page.
function requireAdmin(): void
{
    // TODO 7: check the login first, then the is_admin value stored in the session.
    // For a user who is not an admin: send the 403 status code,
    // show forbidden.php, and stop the script.
    requireLogin();

    if (!($_SESSION['is_admin'] ?? false)) {
        http_response_code(403);
        require __DIR__ . '/../forbidden.php';
        exit;
    }
}
