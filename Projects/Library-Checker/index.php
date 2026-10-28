<?php
//Ryan Martin 
    include("functions.php");
    if($_GET){
        $returnDate = date_create($_GET['Return_Date']) ?? '';
        $dueDate = date_create($_GET['Due_Date']) ?? '';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Library Book Date Checker</title>
</head>
<body>
    <h1>Library Book Date Checker</h1>
    <?php include("form.php"); ?>>
    <?php if($_GET) { ?>
        <h2><?php checkDate_($returnDate, $dueDate)?></h2>
        <p><?php displayDates($returnDate, $dueDate) ?></p>
    <?php } ?>
</body>
</html>