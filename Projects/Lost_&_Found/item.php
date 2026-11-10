<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/database.php';
require_once __DIR__ . '/includes/item-functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
} else {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
}
if ($id === false || $id === null || $id < 1) {
    exit('Choose an item from the list.');
}
$item = getItem($db, $id);
if ($item === false) {
    exit('No item has that ID.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    markClaimed($db, $id);
    header('Location: index.php');
    exit;
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
        <h3 style="text-align: center; color: white;">Found item</h3>
        <br>
        <div class="card" style="max-width: 520px; margin-left: auto; margin-right: auto; background-color: azure;">
            <div class="card-body">
                <h4 class="card-title"><?= htmlspecialchars($item['item_name']) ?></h4>
                <p class="card-subtitle" style="font-size: small;">Found at: <?= htmlspecialchars($item['location_found']) ?></p>
                <hr>
                <p class="card-text"><?= htmlspecialchars($item['description']) ?></p>
                <?php if ((int) $item['claimed'] === 0): ?>
                    <form action="item.php" style="text-align: center;" method="post">
                        <input type="hidden" name="item_id" value="<?= $id ?>">
                        <button style="height: 50px; width: 175;" type="submit" class="theme-primary btn-outline rounded-pill">Mark claimed</button>
                    </form>
                <?php else: ?>
                    <p>This item has already been claimed.</p>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>
