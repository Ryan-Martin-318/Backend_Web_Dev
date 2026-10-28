<?php
    $message = '';
    $validEmail = false;
    $emailPattern = array("/@gmail.com/i", "/@outlook.com/i", "/@hotmail.com/i", "/@icloud.com/i");
    if ($_GET("Email")){
        $email = htmlspecialchars($_GET("Email"));
        if ($email = '' || $email = NULL){
            $message = 'Email is empty.';
        }else{
            foreach($emailPattern as $pattern){
                if(preg_match($pattern, $email)){
                    $validEmail = true;
                }
            }
            if ($validEmail){
                $message = 'Form completed!';
            }else{
                $message = 'Email is invalid.';
            }
        }
    }else{
        $message = 'Please insert your email!';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo($message) ?></p>
    <form method="get">
        <input type="text" name="Email" id="Email"/>
        <input type="submit"/>
    </form>
</body>
</html>