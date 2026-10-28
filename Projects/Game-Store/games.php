<?php
    $games = [];
    $file = fopen("games/games.csv", "r");
    if ($file !== false) {
        while (($line = fgets($file)) !== false) {
            $games[] = str_getcsv($line);
        }
        fclose($file);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require __DIR__ . '/includes/bootstrapcdnlinks.php'; ?>
</head>
<body>
    <?php include 'includes/navagations.php'; ?>
    <h1 class="display-1" style="text-align: center;">Game Library</h1>
    <table border="1" class="table align-middle">
        <thead>
            <tr>
                <th class="h3" style="text-align: center;">Image</th>
                <th class="h3" style="text-align: center;">Title</th>
                <th class="h3" style="text-align: center;">Platform</th>
                <th class="h3" style="text-align: center;">Price</th>
                <th class="h3" style="text-align: center;">Game ID</th>
            </tr>
        </thead>
    <?php foreach ($games as $game) { ?>
        <tr>
            <td style="width: 25%; text-align: center; vertical-align: middle;"><img src="uploads/<?php echo htmlspecialchars($game[4]); ?>" class="img-fluid" style="width: 60%;"alt="<?php echo htmlspecialchars($game[1]); ?>"></td>
            <td style="margin: auto; text-align: center;" class="lead"><?php echo htmlspecialchars($game[1]); ?></td>
            <td style="margin: auto; text-align: center;" class="lead"><?php echo htmlspecialchars($game[2]); ?></td>
            <td style="margin: auto; text-align: center;" class="lead"><?php echo "$" . htmlspecialchars($game[3]); ?></td>
            <td style="margin: auto; text-align: center;" class="lead"><?php echo htmlspecialchars($game[0]); ?></td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>