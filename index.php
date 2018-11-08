<?php
$months = 12;
$starting_money = 1000;
$alga = 700;
$visos_islaidos = 0;
$likutis = $starting_money;
$head = null;

for ($i = 0; $i < $months; $i++) {
    $islaidos = rand(200, 1200);
    $visos_islaidos += $islaidos;
    $likutis += $alga - $islaidos;
    if ($likutis <= 0) {
        $head = " Bloga prognozė $i mėnesį gali baigtis pinigai!!! <br>";
        break;
    }
}

$vid_islaidos = round($visos_islaidos / $months);
$head .= "Per $i prognuozuotų mėnesių, vidutinės išlaidos: $vid_islaidos Likutis pabaigoje: $likutis ";
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