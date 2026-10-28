<?php
declare(strict_types=1);

require __DIR__ . '/includes/database.php';
require __DIR__ . '/classes/Product.php';

function getProduct(PDO $db, int $id){
    // The 3 is typed by us. Nothing from a visitor is in this SQL yet (Week 10 changes that).
        $sql = "SELECT products.productID, products.productCode, products.productName,
                    products.description, products.listPrice,
                    products.categoryID, categories.categoryName
                FROM products
                JOIN categories ON products.categoryID = categories.categoryID
                WHERE products.productID = $id";

    $statement = $db->query($sql);
    $row = $statement->fetch(PDO::FETCH_ASSOC);   // one row

    return Product::fromRow($row);
}
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$product = null;
$error = '';

if ($id === false || $id === null) {
    $error = 'Choose a product from the list.';
} else {
    $product = getProduct($db, $id);
    if ($product === null) {
        $error = "No product has the ID $id.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $product !== null ? htmlspecialchars($product->name) : 'Product' ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; max-width: 40rem; }
    </style>
</head>
<body>
    <p><a href="products.php">&larr; All products</a></p>

    <?php if ($product !== null): ?>
        <h1><?= htmlspecialchars($product->name) ?></h1>
        <p><strong><?= htmlspecialchars($product->category) ?></strong> &middot; <?= $product->formattedPrice() ?></p>
        <p><?= nl2br(htmlspecialchars($product->description)) ?></p>
    <?php else: ?>
        <p><?= htmlspecialchars($error ?? 'Choose a product from the list.') ?></p>
    <?php endif; ?>
</body>
</html>
