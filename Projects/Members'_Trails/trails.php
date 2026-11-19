<?php
    require __DIR__ . '/includes/includes.php';
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e){
        echo '<p>Error: ' . $e->getMessage() . '</p>';
        return NULL;
    }
    $sql = 'SELECT t.trail_name, d.difficulty_name
            FROM trails AS t
            JOIN difficulty_levels AS d ON t.difficulty_id = d.difficulty_id';
    $statement = $db->prepare($sql);
    $statement->execute();
    $trails = $statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trails</title>
</head>
<body style="background-color: darkslategray;">
    <?php getNavbar('Trails'); ?>
    <table class="table table-primary table-striped" style="margin-top: 20px; width: 50%; margin-left: auto; margin-right: auto; border: 2px solid white;">
        <tr>
            <th>Trail Name</th>
            <th>Trail Difficulty</th>
        </tr>
        <?php foreach($trails as $trail){ ?>
            <tr>
                <td><?php echo htmlspecialchars($trail[0]) ?></td>
                <td><?php echo htmlspecialchars($trail[1]) ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>