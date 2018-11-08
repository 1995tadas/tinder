<?php
$x = 10;
$number = null;
for ($y = 2; $y < 20; $y++) {
    $number .= "X vertė yra :$x, Y:$y <br>";
    $x += $y;
}
?>
<!DOCTYPE html>
<html>
    <head> 
        <title></title>
        <style>
        </style>
    </head>
    <body >
        <h1><?php print $number ?></h1>
    </body>
</html>