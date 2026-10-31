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
    $errors = array();
    if (!filter_input(INPUT_GET, "filt", FILTER_VALIDATE_INT)){
        $filter = $_GET['filt'] ?? NULL;
        if ($filter !== "" && $filter !== NULL){ 
            $errors[] = 'Invalid filter detected!';
        }
    }elseif (empty($clubs)){
        $errors[] = 'Try a diffrent filter.';
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Finder</title>
    <?php require __DIR__ . '/includes/bootstrapcdnlinks.php'; ?>
</head>
<body style="background-color: lemonchiffon;">
    <?php require __DIR__ . '/includes/navagation.php'; ?>
    <?php if(empty($errors)) { ?>
        <form method="GET" class="row lg:row-cols-auto g-3 align-items-center">
            <div class="row g-3 align-items-center" style="justify-content: center;">
                <div class="col-auto">
                    <select name="filt" class="form-control" id="fieldSelect">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $category){ ?>
                        <option value="<?= (int) $category->id ?>"
                            <?= (int) $category->id === (int) ($_GET['filt'] ?? 0) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($category->categoryName) ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn-solid theme-primary justify-self-start">Apply Filter</button>
                </div>
            </div>
        </form>
        <div class="table-card" style="padding-left: 5%; padding-right: 5%; margin-top: 3%;">
            <table class="table table-hover" style="border-color: black;">
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
                <tbody class="table-group-divider">
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
        </div>
    <?php }else{ ?>
        <div class="alert alert-danger" role="alert" style="width: 50%; margin-top: 5%; margin-left: auto; margin-right: auto;">
            <vstack>
                <h1 class="alert-heading mb-2">No Clubs Found!</h1>
                <p><?php echo htmlspecialchars($errors[0]); ?></p>
                <hr class="my-3">
                <a href="clubs.php?filt=" class="alert-link">Go Choose A Club</a>
            </vstack>
        </div>
    <?php } ?>
</body>
</html>