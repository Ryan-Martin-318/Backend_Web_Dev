<?php
require __DIR__ . '/includes/database.php';
require_once __DIR__ . '/classes/Song.php';
require_once __DIR__ . '/includes/song-functions.php';


$title = '';
$artist = '';
$isFavorite = 0;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Provided input checks keep this lesson focused on database statements.
    $title = trim($_POST['title']);
    $artist = trim($_POST['artist']);
    $isFavorite = isset($_POST['is_favorite']) ? 1 : 0;

    if ($title === '') {
        $errors[] = 'Enter a song title.';
    }
    if ($artist === '') {
        $errors[] = 'Enter an artist.';
    }

    if (!$errors) {
        // Collect the validated values into one Song object.
        $song = new Song($title, $artist, (bool) $isFavorite);
        addSong($db, $song);
        // header('Location: add-song.php');
        // exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Add a song</title><link rel="stylesheet" href="styles.css"></head>
<body>
<h1>Add a song</h1>
<p><a href="index.php">Back to collection</a></p>
<?php if ($errors): ?>
<ul class="errors">
<?php foreach ($errors as $error): ?><li><?= htmlspecialchars($error) ?></li><?php endforeach; ?>
</ul>
<?php endif; ?>
<form action="add-song.php" method="post">
    <label for="title">Song title</label>
    <input type="text" id="title" name="title" maxlength="150" required value="<?= htmlspecialchars($title) ?>">
    <label for="artist">Artist</label>
    <input type="text" id="artist" name="artist" maxlength="150" required value="<?= htmlspecialchars($artist) ?>">
    <label><input type="checkbox" name="is_favorite" value="1" <?= $isFavorite === 1 ? 'checked' : '' ?>> One of my favorites</label>
    <p><button type="submit">Save song</button></p>
</form>
</body>
</html>
