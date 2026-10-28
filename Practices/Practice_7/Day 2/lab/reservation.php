<?php
// Week 7 Day 2 Lab - Reservation Class, Part 2 (teacher solution)
// Builds on the Day 1 Reservation class.
// Run from the terminal: php reservation.php
declare(strict_types=1);

date_default_timezone_set('America/Chicago');

class Reservation
{
    public static int $nextId = 1;

    public int $id;
    public string $guestName;
    private int $partySize;          // PART 1: private, so only the setter can change it
    public DateTime $when;           // PART 3: a property can hold an object

    // PART 3: one date-and-time string becomes a DateTime object.
    // If the string isn't a real date, new DateTime() throws an Exception
    // and the caller's try/catch handles it.
    public function __construct(string $guestName, int $partySize, string $dateTime)
    {
        $this->when = new DateTime($dateTime);

        $this->id = self::$nextId;
        self::$nextId++;

        $this->guestName = $guestName;
        $this->partySize = $partySize;
    }

    // PART 1: setter. Rule: 1 to 12 guests. Returns true if changed, false if refused.
    public function setPartySize(int $newSize): bool
    {
        if ($newSize < 1 || $newSize > 12) {
            return false;
        }

        $this->partySize = $newSize;
        return true;
    }

    // PART 1: getter
    public function getPartySize(): int
    {
        return $this->partySize;
    }

    public function needsLargeTable(): bool
    {
        return $this->partySize >= 6;
    }

    public function depositDue(): float
    {
        return $this->partySize * 10.00;
    }

    // PART 3: a method that uses the DateTime property's format() method
    public function formattedWhen(): string
    {
        return $this->when->format('D, M j \a\t g:i A');
    }

    // PART 2: summary() becomes the magic method __toString()
    public function __toString(): string
    {
        $table = $this->needsLargeTable() ? 'large table' : 'standard table';

        return "#{$this->id}: {$this->guestName}, party of {$this->partySize}, {$this->formattedWhen()} "
            . "({$table}, deposit $" . number_format($this->depositDue(), 2) . ')';
    }
}

$smith = new Reservation('Smith', 4, '2026-10-16 18:30');
$garcia = new Reservation('Garcia', 8, '2026-10-17 19:00');

// PART 2: echo the objects directly
echo $smith . "\n";
echo $garcia . "\n\n";

// PART 1: test the setter with a valid and an invalid size
if ($smith->setPartySize(6)) {
    echo "Smith party size changed to {$smith->getPartySize()}.\n";
}

if (!$garcia->setPartySize(20)) {
    echo "Garcia party size not changed: must be 1 to 12. Still {$garcia->getPartySize()}.\n";
}

// PART 4: try/catch for the wrong type (strict types)
try {
    $smith->setPartySize('ten');
} catch (TypeError $e) {
    echo "Party size must be a whole number.\n";
}

// PART 4: try/catch for a date DateTime can't read
try {
    $lee = new Reservation('Lee', 2, 'next blursday');
    echo $lee . "\n";
} catch (Exception $e) {
    echo "Could not create Lee's reservation: that isn't a valid date.\n";
}

// PART 5: an array of reservations
echo "\n";
$reservations = [$smith, $garcia];

foreach ($reservations as $reservation) {
    echo $reservation . "\n";
}
