<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/database.php';
require_once __DIR__ . '/classes/FoundItem.php';
require_once __DIR__ . '/includes/item-functions.php';

$itemName = '';
$description = '';
$locationFound = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemName = trim($_POST['item_name']);
    $description = trim($_POST['description']);
    $locationFound = trim($_POST['location_found']);

    if ($itemName === '') {
        $errors[] = 'Enter an item name.';
    }
    if ($description === '') {
        $errors[] = 'Enter a description.';
    }
    if ($locationFound === '') {
        $errors[] = 'Enter the location found.';
    }
    if (!$errors) {
        $item = new FoundItem($itemName, $description, $locationFound);
        addItem($db, $item);
        header('Location: index.php');
        exit;
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Campus Lost &amp; Found</title>
    </head>
    <body style="background-color: darkcyan;">
        <?php include 'includes/navbar.php'; ?>
        <br>
        <h3 style="text-align: center; color: white;">Report a found item</h3>
        <br>
        <?php if ($errors): ?>
            <ul>
                <?php foreach ($errors as $error): ?><li><?= htmlspecialchars($error) ?></li><?php endforeach; ?>
            </ul>
        <?php endif; ?>
            <form action="add-item.php" method="post" style="width: 750px; margin-left: auto; margin-right: auto; padding: 15px; background-color: azure; border-style: solid;">
                <div class="mb-3">
                    <label class="form-label" for="item_name">Item name</label>
                    <input class="form-control" type="text" id="item_name" name="item_name" maxlength="100" required value="<?= htmlspecialchars($itemName) ?>">
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" maxlength="500" required><?= htmlspecialchars($description) ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="location_found">Location found</label>
                    <input class="form-control" type="text" id="location_found" name="location_found" maxlength="100" required value="<?= htmlspecialchars($locationFound) ?>">
                </div>
                <p style="text-align: center;"><button type="submit" class="theme-primary btn-outline rounded-pill" style="width: 500px; height: 50px;">Add item</button></p>
            </form>
    </body>
</html>
