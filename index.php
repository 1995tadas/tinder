<?php
$sunny = rand(0, 1);
if ($sunny) {
    $oras = 'Saulėta!';
    $klase = 'sauleta';
} else {
    $oras = 'Debesuota :(';
    $klase = 'debesuota';
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
        </style>
    </head>
    <body>
        <div class="klase <?php print $klase ?>"></div>
        <h1><?php print $oras ?></h1>
    </body>
</html>