<?php 
function removeSign($amount){
    $cleanedAmount = str_replace(['$', ','], '', $amount);

    // Convert the cleaned string to a float
    $numericValue = (float) $cleanedAmount;

    return $numericValue;}

?>