<?php
//Ryan Martin
    function checkDate_($returnDate, $dueDate){
    /*This function will echo if the book is overdue, due today, or how
    many days left the book has. */
        if($returnDate > $dueDate){
            $diff = date_diff($dueDate, $returnDate);
            $daysLeft = $diff->format("%a days");
            echo "Your book is overdue by ", $daysLeft;
        }
        elseif($returnDate < $dueDate){
            $diff = date_diff($returnDate, $dueDate);
            $daysLeft = $diff->format("%a days");
            echo "You have ", $daysLeft, " left to return your book";
        }
        else{
            echo("Your book is due today!");
        }
    }
    function displayDates($returnDate, $dueDate){
    /*This function echos the return and due dates*/
        echo "<br>Return Date: ", $returnDate->format("Y m d");
        echo "<br>Due Date: ", $dueDate->format("Y m d");
    }
?>