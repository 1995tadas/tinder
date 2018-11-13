<?php

function add($x, $y) {
    $suma = $x + $y;
    return "$x + $y suma:".$suma;
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
        <h1><?php print add(7, 8) ?></h1>
    </body>
</body>
</html>