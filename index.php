<?php
$fridge = [
    'kebabas' => 2.50,
    'alus' => 1.89,
    'burokai' => 1.50
];

$keys = array_keys($fridge);
$rand_idx = rand(0, count($keys) - 1);
$produkto_idx = $keys[$rand_idx];
$Kaina = $fridge[$produkto_idx];
$Produktas = " " . $produkto_idx;
?>



<!DOCTYPE html>
<html>
    <head> 
        <title></title>
        <style>

            .img-style {
                height:500px;
                width:400px;
                background-size:cover;
            }
            .burokai {
                background-image:url(http://www.sos03.lt/files/images/Raudonieji%20burokeliai.jpg);
            }
            .alus {
                background-image:url(https://cdn1.wine-searcher.net/images/labels/92/11/duff-the-legendary-beer-germany-10649211.jpg);
            }
            .kebabas {
                background-image:url(https://www.recipetineats.com/wp-content/uploads/2017/11/Chicken-Doner-Kebab-2-680x1020.jpg);
            }
        </style>
    </head>
    <body>
        <div class ="img-style <?php print $Produktas ?>"></div>
        <p><b><?php print $Kaina ?> €</b></p>
    </body>
</body>
</html>