<?php
// All of the SQL for this app lives here. The pages call these functions.

// A join: each movie with the name of its genre
function getMoviesWithGenres(PDO $db): array
{
    $sql = 'SELECT movies.title, movies.release_year, genres.genre_name
            FROM movies
            INNER JOIN genres ON movies.genre_id = genres.genre_id
            ORDER BY movies.title';
    return $db->query($sql)->fetchAll();
}

// Save a new user. The password is stored in the password_hash column.
function addUser(PDO $db, string $username, string $storedPassword): void
{
    $sql = 'INSERT INTO users (username, password_hash)
            VALUES (:username, :password_hash)';
    $statement = $db->prepare($sql);
    $statement->execute([
        ':username' => $username,
        ':password_hash' => $storedPassword,
    ]);
}
