<?php
$zodziai = [
    "Petras",
    "Ejo",
    "Papjove",
    "Arkli",
    "Isgeres",
    "Alu"
];
$zodziai2 = [
    "condign",
    "xylology",
    "isohalsine",
    "apophasis",
    "koine",
    "nictate"
];

function demo_text($array, $lenght) {
    $text = null;
   for (;strlen($text) < $lenght;) {
        $text .=$array[array_rand($array)] . " ";
    }
    return $text;
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
        <h1> <?php print demo_text($zodziai, 10000) ?></h1>
    </body>
</body>
</html>