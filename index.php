<?php
date_default_timezone_set('Europe/Vilnius');
?>
<!DOCTYPE html>
<html lang="lt">
    <head>
        <meta charset="UTF-8">
        <title> PHP lydės ir <?php print 'ryt ' . date('d-m-Y', strtotime('+1 day')); ?></title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <h1><b>Tadas</b> - PHP su manim buvo ir <?php print date('G', strtotime('-1 hour')) . ' valanda!' ?></h1>
        <p>
            <?php print date("Y", strtotime("+1 year")) ?> ne už kalnų!
        </p>  
    </body>
</html>

