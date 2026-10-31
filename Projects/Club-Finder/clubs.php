<?php
    require __DIR__ . '/includes/database.php';
    require __DIR__ . '/classes/Club.php';
    require __DIR__ . '/classes/Category.php';
    function clubFilter($get){
        if ($get === "" || $get === NULL){
            $sql = "SELECT c.club_id, c.club_name, c.description, c.meeting_time, c.meeting_location, c.contact_email, c.category_id, cat.category_name
            FROM clubs AS c
            JOIN categories AS cat ON c.category_id = cat.category_id";
        }else{
            $sql = "SELECT c.club_id, c.category_id, c.club_name, c.description, c.meeting_time, c.meeting_location, c.contact_email, cat.category_name
            FROM clubs AS c
            JOIN categories AS cat ON c.category_id = cat.category_id
            WHERE c.category_id = :filt";
        }
        return $sql;
    }
    function getClubs(PDO $db){
        $get = $_GET['filt'] ?? NULL;
        $sql = clubFilter($get);
        $stmt = $db->prepare($sql);
        if ($get === "" || $get === NULL) {
            $stmt->execute();
        } else {
            $stmt->execute([':filt' => $get]);
        }
        $clubs = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clubs[] = Club::fromRow($row);
        }
        return $clubs;
    }
    function getCategories(PDO $db){
        $sql = "SELECT * FROM categories";
        $stmt = $db->query($sql);
        $categories = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = Category::fromRow($row);
        }
        return $categories;
    }
    $clubs = getClubs($db);
    $categories = getCategories($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Club Finder</title>
</head>
<body>
    <h1></h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Meeting Time</th>
                <th>Meeting Location</th>
                <th>Contact Email</th>
                <th>Category Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clubs as $club) { ?>
                <tr>
                    <td><a href="club.php?id=<?php echo $club->id; ?>"><?php echo htmlspecialchars($club->name); ?></a></td>
                    <td><?php echo htmlspecialchars($club->description); ?></td>
                    <td><?php echo htmlspecialchars($club->meetingTime); ?></td>
                    <td><?php echo htmlspecialchars($club->meetingLocation); ?></td>
                    <td><?php echo htmlspecialchars($club->contactEmail); ?></td>
                    <td><?php echo htmlspecialchars($club->categoryName); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <form method="GET">
        <select name="filt">
            <option value="">No Filter</option>
            <?php foreach ($categories as $category){ ?>
            <option value="<?= (int) $category->id ?>"
                <?= (int) $category->id === (int) ($_GET['filt'] ?? 0) ? 'selected' : '' ?>>
                <?= htmlspecialchars($category->categoryName) ?>
            </option>
            <?php } ?>
        </select>
        <input type="submit" value="Apply Filter">
    </form>
</body>
</html>