<?php
$sunny = rand(0, 1);
$rain = rand(0, 1);
if ($sunny && $rain == true) {
    $oras = 'Saulėta!';
    $klase = 'sauleta';
} elseif ($sunny && $rain == false) {
    $oras = 'Debesuota :(';
    $klase = 'debesuota';
} else {
    $oras = 'Pragiedruliai';
    $klase = 'pragiedruliai';
}
?>
<!DOCTYPE html>
<html>
    <head> 
        <title></title>
        <style>
            .klase {
                background-size: cover;
                width: 100px;
                height: 100px
            }
            .debesuota {
                background-image:url(/images/debesys.png);
            }
            .sauleta {
                background-image:url(/images/saule.png);
            }
            .pragiedruliai {
                background-image:url(/images/pragiedruliai.png);
            }
        </style>
    </head>
    <body>
        <div class="klase <?php print $klase ?>"></div>
        <h1><?php print $oras ?></h1>
    </body>
</html>