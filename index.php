<?php
$months = 12;
$starting_money = 1000;
$alga = 700;
$visos_islaidos = 0;
$likutis = $starting_money;

for ($i = 0; $i < $months; $i++) {
    $islaidos = rand(200, 500);
    $visos_islaidos += $islaidos;
    $likutis += $alga - $islaidos;
}

$vid_islaidos = $visos_islaidos / $months;
$head = "Per $months prognuozuotų mėnesių, vidutinės išlaidos: " . round($vid_islaidos) . " Likutis pabaigoje: $likutis";
?>
<!DOCTYPE html>
<html>
    <head> 
        <title></title>
        <style>
        </style>
    </head>
    <body >
        <h1><?php print $head ?></h1>
    </body>
</html>