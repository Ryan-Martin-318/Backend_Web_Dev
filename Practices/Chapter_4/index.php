<?php
    include("functions.php");
    $futureDate = null;

    if (($_GET)) {
        echo($_GET['numDays']);
        $futureDate = calculateFutureDate($_GET['numDays']);
        echo " Future: $futureDate"; //for troubleshooting
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        defer></script>
</head>

<body>
    <?php include ("nav.php"); ?>
    <main class="container mt-4">
        <h1>Date Calculator</h1>
        <?php include ("form.php"); ?>
        <h2>
            <?php
            if (isset($_GET['numDays'])) {
                echo $futureDate;
                echo("here");
            } else {
                todaysDate();
                echo ("there");
            }
            ?>
        </h2>
    </main>
</body>

</html>
