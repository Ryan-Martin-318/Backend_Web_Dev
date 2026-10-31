<?php
declare(strict_types=1);
class Category{
    public static int $idCount = 1;
    public int $id;
    public string $categoryName;
    public function __construct(string $categoryName)
    {
        $this->id = self::$idCount++;
        $this->categoryName = $categoryName;
    }
    public static function fromRow(array $row): Category {
        return new Category(
            $row['category_name']
        );
    }
}