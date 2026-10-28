<?php
$menuTotal = 0;
$menuItems = 0;
$mealMessage = "Welcome to the Campus Café!";
$customerType = "student";
$mealPeriod = "lunch";
$discountMessage = $customerType == "student" ? "Student discount available." : "Regular pricing.";  

switch ($mealPeriod) {
    case "breakfast":
        $mealMessage = "Breakfast is served until 10:30 AM.";
        break;
    case "lunch":
        $mealMessage = "Lunch is now being served";
        break;
    case "dinner":
        $mealMessage = "Dinner begins at 5:00 PM.";
        break;
}
$discountRate = match($customerType) {
    "student" => 0.10,
    "employee" => 0.15,
    default => 0.00,
};
$discountPercentage = $discountRate * 100;

$menu = [
    "Burger" => 6.50,
    "Salad" => 5.75,
    "Pizza" => 4.50,
    "Soup" => 3.25
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Café</title>
</head>
<body>
    <h1>Campus Café</h1>
    <p><?php echo $discountMessage; ?></p>
    <p><?php echo $mealMessage; ?></p>
    <table>
        <thead>
            <tr>
                <th>Menu Item</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menu as $item => $price) { ?>
                    <tr>
                        <td><?= $item ?></td>
                        <td><?= number_format($price, 2) ?></td>
                        <?php $menuTotal += $price; $menuItems++; ?>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
    <p>Total Menu Items: <?= $menuItems ?></p>
    <p>Total Price: $<?= number_format($menuTotal, 2) ?></p>
</body>
</html>