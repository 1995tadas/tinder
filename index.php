<?php
$distance = rand(500, 1000);
$fuel_100km = 7.5;
$fuel_price = 1.3;
$my_money = 70;
$bako_talpa = 50;
$fuel = ($distance / 100) * $fuel_100km;
$price = $fuel * $fuel_price;
$head = "Nuvažiavus $distance  km, mašina sunaudos " . round($fuel) . " l. kuro.
Kaina " . round($price) . " Jevrų !!!<br>";

if ($my_money >= $price) {
    $head .= 'galiu <br>';
} else {
    $head .= 'negaliu <br>';
}

if($bako_talpa < $fuel ) {
    $head .= "Kuro pakartotinai pilti reikės ";
    $pilimas = $bako_talpa/$fuel;
    $head .= ceil($pilimas)." kartą";
} else {
    $head .= "Kuro pakartotinai pilti nereikės";
}
?>
<!DOCTYPE html>
<html>
    <head> 
        <title></title>
        <style>
        </style>
    </head>
    <body>
        <h1>
            <?php print $head ?>
        </h1>
    </body>
</html>