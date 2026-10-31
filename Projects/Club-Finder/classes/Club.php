<?php
declare(strict_types=1);
class Club{
    public static int $idCount = 1;
    public int $id;
    public string $name;
    public string $description;
    public string $meetingTime;
    public string $meetingLocation;
    public string $contactEmail;
    public int $categoryId;
    public string $categoryName;
    public function __construct(
        string $name,
        string $description,
        string $meetingTime,
        string $meetingLocation,
        string $contactEmail,
        int $catrgoryId,
        string $categoryName
    ){
        $this->id = self::$idCount++;
        $this->name = $name;
        $this->description = $description;
        $this->meetingTime = $meetingTime;
        $this->meetingLocation = $meetingLocation;
        $this->contactEmail = $contactEmail;
        $this->categoryId = $catrgoryId;
        $this->categoryName = $categoryName;
    }
    public static function fromRow(array $row): Club {
        return new Club(
            $row['club_name'],
            $row['description'],
            $row['meeting_time'],
            $row['meeting_location'],
            $row['contact_email'],
            $row['category_id'],
            $row['category_name']
        );
    }
}