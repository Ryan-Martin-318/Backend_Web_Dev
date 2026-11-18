-- CIS 239: Movie Favorites database (Week 12)
-- Import in phpMyAdmin (Import tab). Safe to run again: it rebuilds the database.

DROP DATABASE IF EXISTS movie_favorites;
CREATE DATABASE movie_favorites;
USE movie_favorites;

CREATE TABLE genres (
    genre_id   INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    genre_name VARCHAR(50) NOT NULL
);

CREATE TABLE movies (
    movie_id     INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title        VARCHAR(100) NOT NULL,
    release_year SMALLINT UNSIGNED NOT NULL,
    genre_id     INT UNSIGNED NOT NULL,
    FOREIGN KEY (genre_id) REFERENCES genres (genre_id)
);

CREATE TABLE users (
    user_id       INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username      VARCHAR(30) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
);

INSERT INTO genres (genre_name) VALUES
    ('Animation'), ('Comedy'), ('Drama'), ('Horror'), ('Science Fiction'), ('Western');

INSERT INTO movies (title, release_year, genre_id) VALUES
    ('Toy Story', 1995, 1),
    ('Spirited Away', 2001, 1),
    ('Groundhog Day', 1993, 2),
    ('Airplane!', 1980, 2),
    ('The Shawshank Redemption', 1994, 3),
    ('Forrest Gump', 1994, 3),
    ('Psycho', 1960, 4),
    ('Get Out', 2017, 4),
    ('Blade Runner', 1982, 5),
    ('The Matrix', 1999, 5),
    ('True Grit', 2010, 6),
    ('Unforgiven', 1992, 6);
