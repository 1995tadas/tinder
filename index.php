<?php

/**
 * Funkcija surasti keliamiesiems metams
 * 
 * @param integer $x nurodytu metu parametras
 * @return string 
 */
function is_leap_year($x) {


    if (date('L', strtotime("$x-01-01")) == 1) {
    //date('L') jeigu metai keliamieji grazina 1, jeigu ne 0
    //srttotime() nurodyta teksttini laika pavercia date
    //if() tikrina ar date('L') nurodyti metai  yra true or false jeigu true isveda,
    // kad metai keliamieji jei false, kad nekeliamieji
        return $x . ' metai yra keliamieji';
    } else {
        return $x . ' metai yra nekeliamieji';
    }
}

is
?>
<!DOCTYPE html>
<html>
    <head> 
        <title></title>
        <style>
        </style>
    </head>
    <body>
        <h1> <?php print is_leap_year(2015) ?></h1>
    </body>
</body>
</html>