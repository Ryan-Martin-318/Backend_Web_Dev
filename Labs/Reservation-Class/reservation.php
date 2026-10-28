<?php
//The essentials ====================================================
    declare(strict_types=1);
    global $cost;
    $cost = 9.99;
//The class =========================================================
    class Reservation{
        public static int $nextId = 1;
        public int $id;
        public int $partySize;
        public string $partyName;
        public string $reservationDate;
        public bool $VIP;
        public function __construct(int $partySize, string $partyName, string $reservationDate, bool $VIP)
        {
            $this->id = self::$nextId;
            self::$nextId++;
            $this->partySize = $partySize;
            $this->partyName = $partyName;
            $this->reservationDate = $reservationDate;
            $this->VIP = $VIP;
        }
        public function getCost(): float{
            if($this->VIP){
                return $this->partySize * ($GLOBALS['cost'] * 1.2);
            }
            return $this->partySize * $GLOBALS['cost'];
        }
        public function information(): string{
            return "Reservation ID: " . self::$id . "<br>" .
                    "Party Size: " . $this->partySize . "<br>" .
                    "Party Name: " . $this->partyName . "<br>" .
                    "Reservation Date: " . $this->reservationDate . "<br>" .
                    "VIP: " . ($this->VIP ? "Yes" : "No") . "<br>";
        }
    }
//The printing =======================================================
$reservationA = new Reservation(4, "Smith", "2024-07-01", false);
$reservationB = new Reservation(2, "Johnson", "2024-08-02", true);
echo $reservationA->information() . "<br>";
echo "Cost: $" . $reservationA->getCost() . "<br>";
echo $reservationB->information() . "<br>";
echo "Cost: $" . $reservationB->getCost() . "<br>";

//Error reservation example
    // $reservationC = new Reservation("number", 0, "2024-09-03", false);
    // echo $reservationC->information() . "<br>";
    // echo "Cost: $" . $reservationC->getCost() . "<br>";
?>