-- Import in local phpMyAdmin using an administrator account.
CREATE DATABASE IF NOT EXISTS trail_guide CHARACTER SET utf8mb4;
USE trail_guide;

CREATE TABLE IF NOT EXISTS difficulty_levels (
    difficulty_id INT PRIMARY KEY,
    difficulty_name VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS trails (
    trail_id INT PRIMARY KEY,
    trail_name VARCHAR(100) NOT NULL,
    difficulty_id INT NOT NULL,
    FOREIGN KEY (difficulty_id) REFERENCES difficulty_levels (difficulty_id)
);

INSERT IGNORE INTO difficulty_levels (difficulty_id, difficulty_name) VALUES
    (1, 'Easy'),
    (2, 'Moderate'),
    (3, 'Hard');

INSERT IGNORE INTO trails (trail_id, trail_name, difficulty_id) VALUES
    (1, 'Creekside Loop', 1),
    (2, 'Cedar Ridge', 2),
    (3, 'Switchback Summit', 3),
    (4, 'Fern Hollow', 1);

CREATE USER IF NOT EXISTS 'cis239_app'@'localhost' IDENTIFIED BY 'Cis239Classroom';
GRANT SELECT, INSERT ON trail_guide.* TO 'cis239_app'@'localhost';
