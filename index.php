<?php
$fridge = [
    'kebabas' => 2.50,
    'alus' => 1.89,
    'burokai' => 1.50
];

$keys = array_keys($fridge);
$rand_idx = rand(0, count($keys) - 1);
$produkto_idx = $keys[$rand_idx];
$Tekstas = $fridge[$produkto_idx];
$Tekstas.= " ".$produkto_idx;
?>
<!DOCTYPE html>
<html>
    <head> 
        <title></title>
        <style>
        </style>
    </head>
    <body>
        <h2>Kažkada pirkai:</h2>
        <div><?php print $Tekstas ?></div>
    </body>
</body>
</html>