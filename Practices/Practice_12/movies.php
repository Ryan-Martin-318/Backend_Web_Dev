<?php
require __DIR__ . '/includes/database.php';
require __DIR__ . '/includes/db-functions.php';

$movies = getMoviesWithGenres($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie Favorites</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Movie Favorites</h1>
    <p><a href="index.php">Register a user</a></p>

    <table>
        <tr><th>Title</th><th>Year</th><th>Genre</th></tr>
        <?php foreach ($movies as $movie): ?>
            <tr>
                <td><?= htmlspecialchars($movie['title']) ?></td>
                <td><?= htmlspecialchars($movie['release_year']) ?></td>
                <td><?= htmlspecialchars($movie['genre_name']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
