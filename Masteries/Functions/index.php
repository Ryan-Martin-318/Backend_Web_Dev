<?php
    function calculateTotal($price, $taxRate){
        return $price + ($price * $taxRate);
    }
    $orderTotal = calculateTotal(40, 0.08);
    echo $orderTotal;
?>