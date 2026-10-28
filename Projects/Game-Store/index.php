<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        ini_set('file_uploads', 'On');
        $game = [];
        $errors = [];
        $fileTypes = [1, 2, 3, 18];//GIF, JPEG, PNG, WEBP
        $codePattern = '/^GAME-\d{4,4}$/m';
        //Fetching Data
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Gcode = filter_input(INPUT_POST, 'Code');
            $Gname = filter_input(INPUT_POST, 'Game_Name');
            $Gconsole = filter_input(INPUT_POST, 'Console');
            $Gprice = filter_input(INPUT_POST, 'Price');
            $Gimage = $_FILES['Image']['tmp_name'];
            
        }
        //Game Code ================================================
        if(preg_match($codePattern, $Gcode)){
            $game[0] = $Gcode;
        }else{
            $errors['Gcode'] = 'Game Code is Invalid (GAME-1234)';
        }
        //Game Name ================================================
        if($Gname === NULL || $Gname === ''){
            $errors['Gname'] = 'Game Name is Missing!';
        }else{
            $game[1] = $Gname;
        }
        $game[2] = $Gconsole;
        //Price ================================================
        if($Gprice === NULL || $Gprice === ''){
            $errors['Gprice'] = 'Game Price is Missing!';
        }elseif($Gprice <= 0){
            $errors['Gprice'] = 'Game Price must be greater than 0!';
        }else{
            $game[3] = $Gprice;
        }
        //Image ================================================
        if($Gimage === NULL || $Gimage === ''){
            $errors['Gimage'] = 'Game Image is Missing!';
        }else{
            $imageType = exif_imagetype($Gimage);
            if (!in_array($imageType, $fileTypes)){
                $errors['Gimage'] = 'Invalid Image Type!';
            }elseif(empty($errors)){
                $target_dir = "uploads/";
                $now = new DateTimeImmutable('now', new DateTimeZone('UTC'));
                $milliseconds = $now->format('Uv');
                $fileName = $Gname . "-" . $milliseconds;
                $target_file = $target_dir . $fileName;
                if (!move_uploaded_file($Gimage, $target_file)) {
                    $errors['Gimage'] = 'Failed to upload image!';
                }
                else{
                    $game[4] = $fileName;
                }
            }
        }
        if(empty($errors)){
            $csv = fopen('games/games.csv', 'a');
            fputcsv($csv, $game);
            fclose($csv);
            header("Location: games.php"); 
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require __DIR__ . '/includes/bootstrapcdnlinks.php';?>
</head>
<body>
    <?php include 'includes/navagations.php'; ?>
    <h1 class="display-1" style="text-align: center; margin-top: 10px;">Add New Game</h1>
    <form method="post" novalidate enctype="multipart/form-data" class="form-floating">
        <div style="text-align: center; padding: 50px;">
<!-- Game Code input ============================================================================================================================-->
            <div class="mb-3">
                <label for="Code" class="form-label">Game Code</label>
                <input type="text" id="Code" name="Code" required class="form-control">
                <?php if (isset($errors['Gcode'])){ ?>
                    <div class="alert alert-danger">
                        <?php echo $errors['Gcode']; ?>
                    </div>
                <?php } ?>
            </div>
<!-- Game Name input ============================================================================================================================-->
            <div class="mb-3">
                <label for="Game_Name" class="form-label" style="margin-top: 50px;">Game Name</label>
                <input type="text" id="Game_Name" name="Game_Name" required class="form-control">
                <?php if (isset($errors['Gname'])){ ?>
                    <div class="alert alert-danger">
                        <?php echo $errors['Gname']; ?>
                    </div>
                <?php } ?>
            </div>
<!-- Console input ============================================================================================================================-->
            <div class="form-floating">
                <select id="Console" name="Console" required class="form-select" aria-label="Floating label select example" style="margin-top: 50px;">
                    <option value="PC">PC</option>
                    <option value="Xbox">Xbox</option>
                    <option value="Playstation">Playstation</option>
                    <option value="Nintendo">Nintendo</option>
                    <option value="Mobile">Mobile</option>
                    <option value="All">All</option>
                </select>
                <label for="Console">Console</label>
            </div>
<!-- Price input ============================================================================================================================-->
            <div class="mb-3">
                <label for="Price" class="form-label" style="margin-top: 50px;">Price</label>
                <input type="number" id="Price" name="Price" required class="form-control">
                <?php if (isset($errors['Gprice'])){ ?>
                    <div class="alert alert-danger">
                        <?php echo $errors['Gprice']; ?>
                    </div>
                <?php } ?>
            </div>
<!-- Image input ============================================================================================================================-->
            <div class="mb-3">
                <label for="Image" class="form-label" style="margin-top: 50px;">Image</label>
                <input type="file" id="Image" name="Image" required class="form-control">
                <?php if (isset($errors['Gimage'])){ ?>
                    <div class="alert alert-danger">
                        <?php echo $errors['Gimage']; ?>
                    </div>
                <?php } ?>
            </div>
<!-- Submit button ============================================================================================================================-->
            <div class="mb-3"></div>
                <input type="submit">
            </div>
        </div>
    </form>
</body>
</html>