<?php
$produktas = null;
$pavadinimas = null;
$kaina = null;
$aprasymas = null;
$nuolaida = null;
$catalog = [
    "Bulve" => [
        "pavadinimas" => "bulve",
        "kaina" => 0.20,
        "aprasymas" => "Populiariausia daržovė",
    ],
    "Kopustas" => [
        "pavadinimas" => "kopustas",
        "kaina" => 0.70,
        "aprasymas" => "Lapai",
        "nuolaida" => "5%"
    ],
    "Svogunas" => [
        "pavadinimas" => "svogunas",
        "kaina" => 0.50,
        "aprasymas" => "Verksi",
        "nuolaida" => "95%"
    ]
];
?>
<!DOCTYPE html>
<html>
    <head> 
        <title></title>
        <style>
        </style>
    </head>
    <body>
        <?php foreach ($catalog as $item): ?>
            <div class="produktas">
                <span class="pavadinimas">Pavadinimas: <?php print $item['pavadinimas'] ?></span><br>
                <span class="kaina">Kaina: <?php print $item['kaina'] ?></span><br>
                <span class="aprasymas">Aprasymas: <?php print $item['aprasymas'] ?></span><br>
                <?php if (isset($item['nuolaida'])): ?>
                    <span class="nuolaida">Nuolaida: <?php print $item['nuolaida'] ?></span>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </body>
</body>
</html>