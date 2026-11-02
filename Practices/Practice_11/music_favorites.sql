-- Music Favorites: Week 11, Day 1
-- Import once in phpMyAdmin. Re-importing does not reset an existing table.
CREATE DATABASE IF NOT EXISTS music_favorites
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE music_favorites;

CREATE TABLE songs (
    song_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(150) NOT NULL,
    artist VARCHAR(150) NOT NULL,
    is_favorite BOOLEAN NOT NULL DEFAULT 0,
    PRIMARY KEY (song_id)
) ENGINE=InnoDB;

-- Favorite flags are sample preferences, not rankings.
INSERT INTO songs (title, artist, is_favorite) VALUES
('Respect', 'Aretha Franklin', 1),
('Jolene', 'Dolly Parton', 0),
('September', 'Earth, Wind & Fire', 1),
('Billie Jean', 'Michael Jackson', 0),
('Smells Like Teen Spirit', 'Nirvana', 1),
('Doo Wop (That Thing)', 'Lauryn Hill', 0),
('One More Time', 'Daft Punk', 1),
('Rolling in the Deep', 'Adele', 0),
('Dynamite', 'BTS', 0),
('Anti-Hero', 'Taylor Swift', 1);
