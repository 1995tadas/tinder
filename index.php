<?php
$x = 10;
$y = 2;
$number = null;
for ($i = 0; $i <= 10; $i++) {
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