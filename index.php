<?php
date_default_timezone_set("Europe/Vilnius");
$beer_price = 3.49;
$price = null;
$time_per_beer = 60;
?>
<!DOCTYPE html>
<html>
    <head> 
        <title></title>
        <style>
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
            }
            .bokalas {
                background: url("https://cdn.pixabay.com/photo/2017/10/08/00/19/beer-mug-2828463_960_720.png");
                height:500px;
                width:400px;
                background-size: cover;    
            }
            .wc {
                background: url("https://www.freeiconspng.com/uploads/bathroom-bowl-toilet-wc-icon-8.png");
                height:500px;
                width:400px;
                background-size: cover; 
            }
        </style>
    </head>
    <div>
        <?php for ($i = 1; $i < 8; $i++): ?> 
            <div class="center">
                <span>Bokalo numeris: <?php print $i ?></span>
                <div style="background-color:rgba(0,0,0,0.<?php print $i ?>);filter:blur(<?php print $i ?>px)" class="bokalas"></div>
                <span>Kol kas sumokėta: <?php print ($price += $beer_price) ?> jevrų</span>
                <span> Bokalo išgėrimo laikas: <?php print $time = date('G : i', strtotime("+$i hour")); ?> val</span>
                <?php if ($i % 2 == 0): ?> 
                    <div class="wc"> </div>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
</body>
</html>