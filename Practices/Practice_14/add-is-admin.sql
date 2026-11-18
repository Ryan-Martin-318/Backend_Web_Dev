-- CIS 239: Week 13 Day 2. Adds the is_admin column to the users table.
-- Run in phpMyAdmin while signed in as root (SQL tab). The limited cis239_app
-- account cannot alter tables, which is why root runs this one.
-- Safe to run again. After re-importing movie_favorites.sql, run it again.

USE movie_favorites;

ALTER TABLE users ADD COLUMN IF NOT EXISTS is_admin TINYINT(1) NOT NULL DEFAULT 0;

-- To make one registered user an admin, replace the username below,
-- remove the two dashes at the start of the line, and run it:
-- UPDATE users SET is_admin = 1 WHERE username = 'yourusername';
