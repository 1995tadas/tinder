<?php
$answers_array = [
    "TAIP",
    "NE",
    "I DON'T GIVE A FUCK"
];
$answer = $answers_array[array_rand($answers_array)];

if (isset($_POST['klausimas'])) {
    if (strlen($_POST['klausimas']) > 0) {
        $question = $_POST['klausimas'];
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
        </style>
    </head>
    <body>
        <?php if (isset($question)): ?>
            <h1><?php print $question ?></h1>
            <h2><?php print $answer ?></h2>
        <?php endif; ?>

        <form action = "index.php" method ="POST">
            Klausimas:
            <input name="klausimas" type="text" placeholder="Įvesk savo klausimą ..."/>
            <input type="submit" value="Klausk !!!"/>
        </form>
    </body>
</html>