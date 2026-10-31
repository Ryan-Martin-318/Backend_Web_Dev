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
    $errors = array();
    if (!filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT)){
        $filter = $_GET['id'] ?? NULL;
        if ($filter !== "" && $filter !== NULL){ 
            $errors[] = 'Invalid club id detected!';
        }
    }elseif (empty($clubs)){
        $errors[] = 'Club not found.';
    } 
?>
<style>
footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: rgb(33, 37, 41);
    color: white;
    text-align: center;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
        if(empty($errors)){
            echo htmlspecialchars($clubs[0]->name);
        }else{
            echo('ERROR');
        }
    ?></title>
    <?php require __DIR__ . '/includes/bootstrapcdnlinks.php'; ?>
</head>
<body style="background-color: lemonchiffon;">
    <?php require __DIR__ . '/includes/navagation.php'; ?>
    <?php if (empty($errors)) { ?>
        <h1 style="text-align: center; margin-top: 3%;">The <?php echo htmlspecialchars($clubs[0]->name); ?> Club</h1>
        <section class="card" style="max-width: 800px; margin-left: auto; margin-right: auto;">
            <div class="card-body">
                <h4 class="card-title">Category: <?php echo htmlspecialchars($clubs[0]->categoryName); ?></h4>
                <p class="card-text"><?php echo htmlspecialchars($clubs[0]->description); ?></p>
                <hr>
                <table style="width: 100%;">
                    <tr>
                        <td>Meeting Time: <?php echo htmlspecialchars($clubs[0]->meetingTime); ?></td>
                        <td>Meeting Location: <?php echo htmlspecialchars($clubs[0]->meetingLocation); ?></td>
                    </tr>
                </table>
            </div>
        </section>
        <footer>
            <p>Contact Email: <?php echo htmlspecialchars($clubs[0]->contactEmail); ?></p>
        </footer>
    <?php }else { ?>
        <div class="alert alert-danger" role="alert" style="width: 50%; margin-top: 5%; margin-left: auto; margin-right: auto;">
            <vstack>
                <h1 class="alert-heading mb-2">ERROR!</h1>
                <p><?php echo htmlspecialchars($errors[0]); ?></p>
                <hr class="my-3">
                <a href="clubs.php?filt=" class="alert-link">Go Choose A Club</a>
            </vstack>
        </div>
    <?php } ?>
</body>
</html>