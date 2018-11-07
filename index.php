<?php
$mano_pinigai = 1000;
$spent_per_month = 600;
$earned_per_month = 800;
$unknown_per_month = rand(-150, 150);
$months = 24;
$data = date('Y', strtotime("+$months months"));
$wallet_forecast = $mano_pinigai + ($earned_per_month - $spent_per_month + $unknown_per_month) * $months;
?>

<!DOCTYPE html>
<html>
    <head> 
        <title></title>
    </head>
    <body>
        <p> Po <?php print $months . ' (' . $data . ')' ?> mėnesių turėsiu: <?php print $wallet_forecast ?> JEVRŲ!!!</p>
    </body>
</html>