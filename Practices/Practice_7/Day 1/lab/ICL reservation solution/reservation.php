<?php
// Week 7 Day 1 Lab - Reservation Class 
// Run from the terminal: php reservation.php
declare(strict_types=1);

class Reservation
{
    // Shared by the class: the next ID to hand out.
    public static int $nextId = 1;

    // At least three properties.
    public int $id;
    public string $guestName;
    public int $partySize;
    public string $date;
    public string $time;

    // The constructor fills in every property and assigns the unique ID.
    public function __construct(string $guestName, int $partySize, string $date, string $time)
    {
        $this->id = self::$nextId;
        self::$nextId++;

        $this->guestName = $guestName;
        $this->partySize = $partySize;
        $this->date = $date;
        $this->time = $time;
    }

    // Method 1: returns true when the party needs the large table.
    public function needsLargeTable(): bool
    {
        return $this->partySize >= 6;
    }

    // Method 2: returns the estimated deposit ($10 per guest).
    public function depositDue(): float
    {
        return $this->partySize * 10.00;
    }

    // Method 3 (optional): a one-line description built from the other methods.
    public function summary(): string
    {
        $table = $this->needsLargeTable() ? 'large table' : 'standard table';

        return "#{$this->id}: {$this->guestName}, party of {$this->partySize} on {$this->date} at {$this->time} "
            . "({$table}, deposit $" . number_format($this->depositDue(), 2) . ')';
    }
}

$smith = new Reservation('Smith', 4, '2026-10-16', '6:30 PM');
$garcia = new Reservation('Garcia', 8, '2026-10-17', '7:00 PM');

// Confirm every property was set.
print_r($smith);
print_r($garcia);

// Test the methods.
var_dump($smith->needsLargeTable());    // expected: bool(false)
var_dump($garcia->needsLargeTable());   // expected: bool(true)
echo $smith->depositDue() . "\n";       // expected: 40
echo $garcia->depositDue() . "\n";      // expected: 80

echo $smith->summary() . "\n";
echo $garcia->summary() . "\n";
