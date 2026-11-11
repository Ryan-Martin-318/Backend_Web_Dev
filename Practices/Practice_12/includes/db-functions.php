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
// Find one user by username. Returns the row, or false when no user has that username.
function getUserByUsername(PDO $db, string $username)
{
    $sql = 'SELECT user_id, username, password_hash
            FROM users
            WHERE username = :username';
    $statement = $db->prepare($sql);
    $statement->execute([':username' => $username]);
    return $statement->fetch();
}

// Every registered user (used by the admin page)
function getUsers(PDO $db): array
{
    $sql = 'SELECT user_id, username, password_hash FROM users ORDER BY user_id';
    return $db->query($sql)->fetchAll();
}