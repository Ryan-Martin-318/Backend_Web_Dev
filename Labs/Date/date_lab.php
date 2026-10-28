<?php
    function showNow(bool $true_time){
        $timestamp = time();
        if($true_time == true){
            echo($timestamp);
        }
        echo(date(" F j Y, h:i:s a", $timestamp));
    }
    function showStringDate($str){
        $currentTimestamp = time();
        $timestampA = strtotime("next Friday", $currentTimestamp);
        $timestampB = strtotime("2025-12-25", $currentTimestamp);
        echo date("F j Y, h:i:s a", $timestampA), "  and  ", date("F j Y, h:i:s a", $timestampB);
    }
    function showFourthOfJuly(){
        $timestamp = mktime(9, 0, 0, 7, 4, 2026);
        echo(date("F j Y h:i a", $timestamp));
    }
    function addThirtyDaysBySeconds(){
        $presentTimestamp = time();
        $fututreTimestamp = strtotime("+2592000 seconds", $presentTimestamp);
        echo(date("F j Y, h:i:s a", $fututreTimestamp));
    }
    function addOneYearRelative(){
        $presentTimestamp = time();
        $fututreTimestamp = strtotime("+1 year", $presentTimestamp);
        echo(date("F j Y, h:i:s a", $fututreTimestamp));
    }
    function showCentralTime(){
        showNow(false);
        date_default_timezone_set("America/Chicago");
        echo(" =>");
        showNow(false);
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
    <p>#1.  <?php showNow(true) ?><br></p>
    <p>#2.  <?php showStringDate("") ?><br></p>
    <p>#3.  <?php showFourthOfJuly() ?><br></p>
    <p>#4.  <?php addThirtyDaysBySeconds() ?><br></p>
    <p>#5.  <?php addOneYearRelative() ?><br></p>
    <p>#6.  <?php showCentralTime() ?><br></p>
</body>
</html>