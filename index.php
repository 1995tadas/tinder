<?php
$index = null;
$sarasas = null;
$PoVisko = null;
$produktai = null;
$fridge = ['Jogurtas', 'Kebabas', 'Alus', 'Sugedę vaisiai', 'Supuvęs avokadas'];
$noriu = ['Kebabas', 'Alus', 'Pica'];

foreach ($fridge as $value) {
    $index .= $value . '<br>';
}
$random_idx = rand(0, count($fridge) - 1);
$print = $fridge[$random_idx];

foreach ($noriu as $norai) {
    if (in_array($norai, $fridge) == 1) {
        $produktai .= $norai . ' Turiu' . '<br>';
    } else {
        $produktai .= $norai . ' Neturiu' . '<br>';
    }
}

$skirtumas = array_diff($fridge, $noriu);

foreach ($skirtumas as $value) {
    $PoVisko .= $value . '<br>';
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
        <h1>Šiandien valgysiu: </h1>
        <p>
            <?php print $print ?>
        </p>

        <h1>Ar viską turiu šaldytuve </h1>
        <p>
            <?php
            print $produktai;
            ?>
        </p>

        <h1>Šaldytuvo turinys po visko:</h1>
        <p><?php print $PoVisko ?></p>
    </body>
</body>
</html>