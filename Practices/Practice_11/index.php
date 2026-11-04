<?php
require __DIR__ . '/includes/database.php';
require_once __DIR__ . '/includes/song-functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'song_id', FILTER_VALIDATE_INT);
    if ($id === false || $id === null || $id < 1) {
        exit('A valid song ID is required.');
    }

    deleteSong($db, $id);
}


$statement = $db->query('SELECT song_id, title, artist, is_favorite FROM songs ORDER BY title, song_id');
$songs = $statement->fetchAll();
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Music Favorites</title><link rel="stylesheet" href="styles.css"></head>
<body>
<h1>Music Favorites</h1>
<p>A shared collection of songs. A star marks a favorite.</p>
<p><a href="add-song.php">Add a song</a></p>
<table>
<thead><tr><th scope="col">Title</th><th scope="col">Artist</th><th scope="col">Favorite</th><th scope="col">Action</th></tr></thead>
<tbody>
<?php foreach ($songs as $song): ?>
<tr>
    <td><?= htmlspecialchars($song['title']) ?></td>
    <td><?= htmlspecialchars($song['artist']) ?></td>
    <td><?= (int) $song['is_favorite'] === 1 ? '★ Favorite' : '—' ?></td>
    <td>
        <a href="add-song.php?id=<?= (int) $song['song_id'] ?>">Edit</a>
        <form class="inline" action="index.php" method="post">
            <input type="hidden" name="song_id" value="<?= (int) $song['song_id'] ?>">
            <button type="submit" aria-label="Delete <?= htmlspecialchars($song['title']) ?>">Delete</button>
        </form>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php if (!$songs): ?><p>No songs yet. Add one to start the collection.</p><?php endif; ?>
</body>
</html>
