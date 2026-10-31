<?php
    require __DIR__ . '/includes/database.php';
    require __DIR__ . '/classes/Club.php';

    function getClubs(PDO $db){
        $id = $_GET['id'] ?? null;
        if ($id !== null) {
            $sql = "SELECT c.club_name, c.description, c.meeting_time, c.meeting_location, c.contact_email, c.category_id, cat.category_name
                    FROM clubs AS c
                    JOIN categories AS cat ON c.category_id = cat.category_id
                    WHERE c.club_id = :id";

            $stmt = $db->prepare($sql);
            $stmt->execute([':id' => $id]);
            $clubs = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $clubs[] = Club::fromRow($row);
            }
            return $clubs;
        } else {
            return [];
        }
    }
    $clubs = getClubs($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title><?php echo htmlspecialchars($clubs[0]->name); ?></title>
</head>
<body>
    <?php if (!empty($clubs)) { ?>
    <h1>The <?php echo htmlspecialchars($clubs[0]->name); ?> Club</h1>
    <h4>Category: <?php echo htmlspecialchars($clubs[0]->categoryName); ?></h4>
    <p><?php echo htmlspecialchars($clubs[0]->description); ?></p>
    <table>
        <tr>
            <td>Meeting Time: <?php echo htmlspecialchars($clubs[0]->meetingTime); ?></td>
            <td>Meeting Location: <?php echo htmlspecialchars($clubs[0]->meetingLocation); ?></td>
        </tr>
    </table>
    <footer>
        <p>Contact Email: <?php echo htmlspecialchars($clubs[0]->contactEmail); ?></p>
    </footer>
    <?php }else { ?>
        <p>Club not found.</p>
    <?php } ?>
</body>
</html>