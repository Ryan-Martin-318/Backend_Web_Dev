CREATE DATABASE IF NOT EXISTS cis239_farm
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE cis239_farm;

CREATE TABLE IF NOT EXISTS farm_animals (
    animal_id INT UNSIGNED NOT NULL PRIMARY KEY,
    animal VARCHAR(40) NOT NULL,
    quote VARCHAR(255) NOT NULL
);

INSERT IGNORE INTO farm_animals (animal_id, animal, quote) VALUES
    (1, 'cow', '"I herd you were looking for me."'),
    (2, 'pig', '"That joke was a real ham-fisted attempt."'),
    (3, 'chicken', '"I have an egg-cellent alibi."'),
    (4, 'sheep', '"Ewe wool never believe what happened."'),
    (5, 'goat', '"I kid you not."'),
    (6, 'horse', '"Hay, that sounds like a stable plan."');