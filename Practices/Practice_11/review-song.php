<?php
require __DIR__ . '/includes/database.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === false || $id === null || $id < 1) {
    exit('Supply a positive song ID, for example review-song.php?id=1.');
}

$sql = 'SELECT song_id, title, artist, is_favorite FROM songs WHERE song_id = :id';
$statement = $db->prepare($sql);
$statement->execute([':id' => $id]);
$song = $statement->fetch();

echo htmlspecialchars($song['title'] . ' — ' . $song['artist']);
