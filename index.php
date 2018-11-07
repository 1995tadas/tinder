<?php
$liepa_days = 31;
$rugpjutis_days = 30;
$rugsejis_days = 30;
$spalis_days = 31;
$summer_days = $liepa_days + $rugpjutis_days + $rugsejis_days + $spalis_days + date('j');
?>

<!DOCTYPE html>
<html>
    <head> 
        <title></title>
    </head>
    <body>
        <p> Nuo Liepos pradžios iki šiandien praėjo <?php print $summer_days ?> dienų.!</p>
    </body>
</html>