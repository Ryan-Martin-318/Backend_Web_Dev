<?php
/*
 * Week 7 Day 2 - Warm-up: reading a class PHP already provides
 * Run from the terminal: php date-demo.php
 * You already know date() and strtotime(). DateTime does the same jobs as an OBJECT.
 * Add your code BELOW each set of notes.
 */
declare(strict_types=1);

date_default_timezone_set('America/Chicago');

/* WARM-UP 1 NOTES: an object from a built-in class
 * - DateTime is a class PHP already provides. "new DateTime()" builds an object for right now.
 *   Its constructor and all its methods: https://www.php.net/manual/en/class.datetime.php
 * - format() is a METHOD. It takes the same letters as date(): 'l, F j, Y', 'm/d/Y'
 *   Format letters (l = day name, F = month name, j = day, Y = year):
 *   https://www.php.net/manual/en/datetime.format.php
 * - Call it through the object with ->
 */


/* WARM-UP 2 NOTES: the constructor
 * - Whatever you put in new DateTime('...') is passed to the DateTime CONSTRUCTOR.
 * - It understands strings like '2026-12-15' or 'next friday'.
 */


/* WARM-UP 3 NOTES: objects are independent
 * - modify('-3 days') changes the object it is called on, and only that object.
 * - Make two DateTime objects for the same day, modify one, and display both.
 */


/* WARM-UP 4 NOTES: a method can return another object
 * - $first->diff($second) returns a DateInterval object.
 *   Its properties and methods: https://www.php.net/manual/en/class.dateinterval.php
 * - Its ->days property is the number of days between the two dates.
 */


/* WARM-UP 5 NOTES: try / catch
 * - Some code can fail in a way PHP can't recover from on its own:
 *   new DateTime('banana') stops the whole script with an Exception.
 * - Put code that might fail inside try { }.
 * - If it fails, PHP skips the rest of the try block and runs catch (Exception $e) { }.
 * - Exception is a CLASS, like DateTime. When something fails, PHP builds an Exception
 *   OBJECT and hands it to the catch block as $e.
 * - getMessage() is one of its METHODS. It returns PHP's explanation.
 *   The Exception class and its methods: https://www.php.net/manual/en/class.exception.php
 * - After the catch, the script keeps running.
 */
