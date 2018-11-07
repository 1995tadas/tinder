<?php
$sunny = rand(0, 1);
$rain = rand(0, 1);

if ($sunny && !$rain) {
    $oras = 'Saulėta!';
    $klase = 'sauleta';
} elseif (!($rain && $sunny)) {
    $oras = 'Debesuota :(';
    $klase = 'debesuota';
} elseif (!$sunny && $rain) {
    $oras = 'Debesuota su lietum';
    $klase = 'debesuotasulietum';
} elseif ($sunny && $rain) {
    $oras = 'Saulėta su lietum';
    $klase = 'sauletasulietum';
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
            .debesuotasulietum {
                background-image:url(/images/pragiedruliai.png);
            }
            .sauletasulietum {
                background-image:url(/images/sauletasulietum.jpg);
            }
        </style>
    </head>
    <body>
        <div class="klase <?php print $klase ?>"></div>
        <h1><?php print $oras ?></h1>
    </body>
</html>