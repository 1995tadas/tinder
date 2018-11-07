<!DOCTYPE html>
<html>
    <head> 
        <style>
            .bomb{
                transform: scale(0.<?php print date('s'); ?>); 
                content:url("/images/Paveikslėlis1.png");
            }
            .bomb0{
                content:url("/images/explosion.gif");
                transform:scale(1);
            }
        </style>
    </head>
    <body>
        <div class = "bomb<?php print date('s') ?> bomb" ></div>
        <?php
        print date('s');
        ?>

    </body>
</html>