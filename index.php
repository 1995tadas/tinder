<?php
$index = null;
$fridge = ['Jogurtas', 'Kebabas', 'Alus', 'Sugedę vaisiai', 'Supuvęs avokadas'];
for ($i = 0; $i < count($fridge); $i++) {
    $index .= $fridge[$i]."<br>";
}
?>
<!DOCTYPE html>
<html>
    <head> 
        <title></title>
        <style>
        </style>
    </head>
    <body>
        <h1>Šaldytuvo turinys: </h1>
        <p>
            <?php print $index ?>
        </p>
    </body>
</body>
</html>