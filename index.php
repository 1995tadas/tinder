<?php ?>
<!DOCTYPE html>
<html>
    <head> 
        <title></title>
        <style>
        </style>
    </head>
    <body >
        <?php for ($i = 1; $i <= 12; $i++): ?>
            <h1><?php print date('F', mktime(0, 0, 0, $i, 1))?></h1>
        <?php endfor ?>
    </body>
</html>