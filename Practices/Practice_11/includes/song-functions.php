<?php
// Database operations shared by the song pages.
function deleteSong(PDO $db, int $id): void
{
    $sql = 'DELETE FROM songs WHERE song_id = :id';
    $statement = $db->prepare($sql);
    $statement->execute([':id' => $id]);
}
function addSong(PDO $db, Song $song): void
{
    $sql = 'INSERT INTO songs (title, artist, is_favorite)
            VALUES (:title, :artist, :is_favorite)';
    $statement = $db->prepare($sql);
    $statement->execute([
        ':title' => $song->title,
        ':artist' => $song->artist,
        ':is_favorite' => $song->isFavorite ? 1 : 0,
    ]);
}
function getSong(PDO $db, int $id)
{
    $sql = 'SELECT song_id, title, artist, is_favorite
            FROM songs WHERE song_id = :id';
    $statement = $db->prepare($sql);
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}
function updateSong(PDO $db, int $id, Song $song): void
{
    $sql = 'UPDATE songs
            SET title = :title, artist = :artist, is_favorite = :is_favorite
            WHERE song_id = :id';
    $statement = $db->prepare($sql);
    $statement->execute([
        ':title' => $song->title,
        ':artist' => $song->artist,
        ':is_favorite' => $song->isFavorite ? 1 : 0,
        ':id' => $id,
    ]);
}