<?php
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
function getUserByUsername(PDO $db, string $username)
{
    $sql = 'SELECT user_id, username, password_hash
            FROM users
            WHERE username = :username';
    $statement = $db->prepare($sql);
    $statement->execute([':username' => $username]);
    return $statement->fetch();
}
function getUsers(PDO $db): array
{
    $sql = 'SELECT user_id, username, password_hash FROM users ORDER BY user_id';
    return $db->query($sql)->fetchAll();
}