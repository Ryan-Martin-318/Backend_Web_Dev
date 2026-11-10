<?php
function getUnclaimedItems(PDO $db): array
{
    $sql = 'SELECT item_id, item_name, location_found FROM found_items
            WHERE claimed = 0 ORDER BY item_name, item_id';
    $statement = $db->query($sql);
    return $statement->fetchAll();
}

// Task 1: Retrieve one item using a prepared SELECT and the supplied ID.
function getItem(PDO $db, int $id)
{
    $sql = 'SELECT item_id, item_name, description, location_found, claimed
            FROM found_items WHERE item_id = :id';
    $statement = $db->prepare($sql);
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

// Task 2: Mark only the selected item claimed using a prepared UPDATE.
function markClaimed(PDO $db, int $id): void
{
    $sql = 'UPDATE found_items
            SET claimed = 1
            WHERE item_id = :id';
    $statement = $db->prepare($sql);
    $statement->execute([
        ':id' => $id
    ]);
}

// Task 3: Add the supplied object using a prepared INSERT.
function addItem(PDO $db, FoundItem $item): void
{
    $sql = 'INSERT INTO found_items (item_name, description, location_found, claimed)
            VALUES (:item_name, :description, :location_found, 0)';
    $statement = $db->prepare($sql);
    $statement->execute([
        ':item_name' => $item->itemName,
        ':description' => $item->description,
        ':location_found' => $item->locationFound,
    ]);
}
