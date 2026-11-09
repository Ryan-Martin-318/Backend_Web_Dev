-- CIS 239: limited MySQL account for the applications.
-- Run once in phpMyAdmin: SQL tab, while signed in as root.
--
-- The account can read and change rows in the listed database.
-- It cannot create, alter, or drop tables or databases, and it has no
-- access to any other database.

CREATE USER IF NOT EXISTS 'cis239_app'@'localhost' IDENTIFIED BY 'Cis239Classroom';

GRANT SELECT, INSERT, UPDATE, DELETE ON `movie_favorites`.* TO 'cis239_app'@'localhost';

FLUSH PRIVILEGES;

-- To see what the account is allowed to do:
-- SHOW GRANTS FOR 'cis239_app'@'localhost';

-- A later project database needs its own GRANT line, for example:
-- GRANT SELECT, INSERT, UPDATE, DELETE ON `another_database`.* TO 'cis239_app'@'localhost';
