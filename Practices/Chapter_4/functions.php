<?php
    date_default_timezone_set('America/Chicago');
    function todaysDate(){
        $timeStamp = time();
        echo ("Todays Date is $timeStamp");
        echo "Today's date is " . date('M-d-Y ~ g:i:s A T', $timeStamp);
        echo "<br>";
        echo (date_default_timezone_get());


    }

    //todaysDate();

    function calculateFutureDate($daysToAdd){
        global $timeStamp;
        $futureTimeStamp = strtotime(
        "+$daysToAdd days",
        $timeStamp);
        $futureDate = date('M-d-Y ~ g:i:s A T', $futureTimeStamp);
        return $futureDate;
    }

?>