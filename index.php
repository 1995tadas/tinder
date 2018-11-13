<?php
$black_ball = [
    '100%' => "Visiškai taip!",
    '70%' => "Taip",
    '50%' => "Galbūt",
    '30%' => "Ne",
    '100%' => "Nė negalvok!"];

function black_ball($black_ball) {
    return $black_ball[array_rand($black_ball)];
}
?>
<!DOCTYPE html>
<html>
    <head> 
        <title></title>
        <style>
            body {
                background-image:url("http://legomenon.com/images/magic8ball-new2.png");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center; 
                position: relative;
            }
            h1 {
                margin: 0;
                position: absolute;
                top: 300px;
                left: 44%;
                color:white;
            }
        </style>
    </head>
    <body>
        <h1> <?php print black_ball($black_ball) ?></h1>
    </body>
</body>
</html>