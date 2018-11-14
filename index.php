<?php
$cars_array = [
    [
        "modelis" => "Fiat Multipla",
        "kaina" => "300"
    ],
    [
        "modelis" => "Ford Ka",
        "kaina" => "250"
    ]
];
/**
 * Prideda prie esamo masyvo mašinos pardavimo kaina su nuolaida ir išspausdina ar apsimokėjo
 * 
 * @param array $cars_array
 * @return string
 */
function sell_cars($cars_array) {
    foreach ($cars_array as $key => $masina) {
        $masina["pardavimo_kaina"] = rand($masina['kaina'] * 0.7, $masina['kaina'] * 1.3);
        //$masina masyvo key pardavimo_kaina prideda rand +/- 30%
        if ($masina["pardavimo_kaina"] > $masina['kaina']) {
            $masina["apsimokejo"] = "taip";
        } else {
            $masina["apsimokejo"] = "ne";
        }
        //if tikrina ar pardavimo kaina yra didesne uz pradine kaina ir sukuria nauja key apsimokejo su reikšmemis taip arba ne
        $cars_array[$key] = $masina;
        //is ramu nuomenys perkelia į masyvą;
    };
    return $cars_array;
}
se
?>
<!DOCTYPE html>
<html>
    <head> 
        <title></title>
        <style>

        </style>
    </head>
    <body>
        <h1> <?php var_dump(sell_cars($cars_array)) ?></h1>
    </body>
</body>
</html>