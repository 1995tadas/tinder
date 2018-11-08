<?php
$distance = rand(500, 1000);
$fuel_100km = 7.5;
$fuel_price = 1.3;
$fuel = ($distance / 100) * $fuel_100km;
$price = $fuel * $fuel_price;
$text = "Nuvažiavus $distance  km, mašina sunaudos " . round($fuel) . " l. kuro.
Kaina " . round($price) . " Jevrų !!!";
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
            <?php print "$text" ?>
        </h1>
    </body>
</html>