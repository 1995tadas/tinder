<?php
$daiktu_pavadinimai = ["Kremas", "Riešutai", "Telefonas", "Agurkas", "Dažai", "Raktai", "Alus", "Pienas", "Burokas", "Bulve"];
$head = null;
$moters_rankinukas = [];
for ($i = 0; $i <= rand(0, 5); $i++) {
    $daiktas = rand(0, (count($daiktu_pavadinimai) - 1));
    $size = rand(10, 20);

    if (rand(0, 1)) {
        $bright_dark = "Tamsus";
    } else {
        $bright_dark = "Sviesus";
    }
    $moters_rankinukas[] = [
        "pavadinimas" => $daiktu_pavadinimai[$daiktas],
        "dydis" => $size,
        "spalva" => $bright_dark
    ];
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
        <?php foreach ($moters_rankinukas as $turinys): ?>
            <h1><?php print $turinys["pavadinimas"] . " uzima " . $turinys['dydis'] . ' cm3. Daiktas yra ' . $turinys['spalva'] . ". Tikimybe rast yra :" ?></h1>
        <?php endforeach; ?>
    </body>
</body>
</html>