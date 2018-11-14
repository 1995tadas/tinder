<?php
$drinks_array = [
    [
        'pavadinimas' => 'Vodka',
        'turis' => 0.7,
        'promiles' => 40
    ],
    [
        'pavadinimas' => 'Alus',
        'turis' => 0.5,
        'promiles' => 4.5
    ]
];

/**
 * Programa kuri apskaičiuoja kiek bonkių\bambalių galima išgerti kol gryno alkoholio kiekis neviršis $max_level
 * 
 * @param type array $drinks_array
 * @param type integer $max_level
 * @return type array $drinks
 * */
function drinks($drinks_array, $max_level) {
    foreach ($drinks_array as $key => $drink) {
        $pure_alcohol = ($drink['promiles'] / 100) * $drink['turis'];
        //Apskaičiuojam vieno butelio gryną alkoholio kiekį
        $drink['gali_isgert'] = floor($max_level / $pure_alcohol);
        //alkoholio limitą padalinam iš gryno alkoholio kiekio ir gaunam bonkų\bambalių kiekį
        $drinks_array[$key] = $drink;
        //assigninam pakeistą vidinį masivą prie išorinio
    };
    return $drinks_array;
    //gražinam į funkciją
}
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
        </style>
    </head>
    <body>
        <h1> <?php var_dump(drinks($drinks_array, 5)) ?></h1>
    </body>
</html>