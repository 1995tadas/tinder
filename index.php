<?php
$sec = date('s');
if ($sec % 2 == 0) {
    $klase = "square";
} else {
    $klase = "circle";
}
?>
<!DOCTYPE html>
<html>
    <head> 
        <meta http-equiv="refresh" content=1;URL='index.php'">
        <title></title>
        <style>
            .centras{
                text-align: center;
                position: absolute;
                left: 50px;
                top: -165px;
                font-size:300px;
            }
            .vidurys {
                position: absolute;
                margin: auto;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
            }
            .square {
                width: 400px;
                height: 400px;
                background: red;
            }.circle {
                width: 400px;
                height: 400px;
                background: red;
                border-radius: 50%;
            }
        </style>
    </head>
    <body>
        <div class="vidurys <?php print "$klase" ?>"><h1 class="centras"> <?php print "$sec" ?></h1></div>
    </body>
</html>