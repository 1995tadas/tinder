<?php
$PoVisko = null;
$produktai = null;
$fridge = ['Jogurtas', 'Kebabas', 'Alus', 'Sugedę vaisiai', 'Supuvęs avokadas'];
$noriu = ['Kebabas', 'Alus', 'Pica'];



foreach ($fridge as $index => $produktas) {
    if (in_array($produktas, $noriu)) {
        unset($fridge[$index]);
    }
}

foreach ($fridge as $produktas) {
    $PoVisko .= $produktas . '<br>';
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
        <h1>Šaldytuvo turinys po visko:</h1>
        <p><?php print $PoVisko ?></p>
    </body>
</body>
</html>