<!DOCTYPE html>
<html>
    <head> 
        <meta http-equiv="refresh" content=1;URL='index.php'>
        <style>
            .bomb{
                transform:scale(0.<?php print date('s'); ?>); 
                content:url("/images/Paveikslėlis1.png");
            }
            .bomb00{
                transform:scale(1);
                content:url("/images/explosion.gif");
            }
        </style>
    </head>
    <body>
        <div class="bomb<?php print date('s') ?> bomb" ></div>
        <?php
        print date('s');
        ?>
    </body>
</html>