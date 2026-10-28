--
SELECT * 
FROM trail_import;

--
SELECT trail, miles 
FROM trail_import;

--
SELECT trail, miles 
FROM trail_import 
WHERE difficulty = 'Easy';

--
SELECT trail, park 
FROM trail_import 
WHERE miles < 2 
ORDER BY miles;

--
SELECT trail, miles 
FROM trail_import 
ORDER BY miles DESC LIMIT 3;

--how many times is "Ha Ha Tonka State Park" typed in this table?
SELECT park, trail 
FROM trail_import 
ORDER BY park, trail;