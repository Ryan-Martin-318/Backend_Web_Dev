<?php
    require __DIR__ . '/includes/database.php';
    require_once __DIR__ . '/includes/item-functions.php';
    $items = getUnclaimedItems($db);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"
        ><meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Campus Lost &amp; Found</title>
        <?php require __DIR__ . '/includes/bootstrap.php'; ?>
    </head>
    <body style="background-color: darkcyan;">
        <?php include 'includes/navbar.php'; ?>
        <br>
        <h3 style="text-align: center; color: white;">Items still waiting to be claimed.</h3>
        <br>
        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col-6">
                    <?php if (!$items): ?>
                        <p>No unclaimed items right now.</p>
                    <?php else: ?>
                        <ul>
                            <?php foreach ($items as $item): ?>
                                <div class="card" style="max-width: 320px; background-color: whitesmoke;">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="item.php?id=<?= (int) $item['item_id'] ?>"><?= htmlspecialchars($item['item_name']) ?></a></h4>
                                        <p class="card-subtitle fg-3"><?= htmlspecialchars($item['location_found']) ?></p>
                                    </div>
                                </div>
                                <br>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="col-4">
                    <a href="add-item.php">
                        <button type="button" class="theme-primary btn-outline rounded-pill" style="height: 50px; width: 75;">
                            Report a Found Item
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
