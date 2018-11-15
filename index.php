<?php
$answers_array = [
    "TAIP",
    "NE",
    "I DON'T GIVE A FUCK"
];

function write_cookie($question_array) {
    setcookie('magic_ball', json_encode($question_array), time() + 3600);
}

function read_cookie($cookie_name) {
    if (isset($_COOKIE[$cookie_name])) {
        return json_decode($_COOKIE[$cookie_name], true);
    }
    
    return [];
}

$answer = $answers_array[array_rand($answers_array)];
if (isset($_POST['klausimas'])) {
    if (strlen($_POST['klausimas']) > 0) {
        $question = $_POST['klausimas'];
        if (!isset($question_array[$question])) {
            $question_array[$question] = $answer;
            $answer = $question_array[$question];
        }
        read_cookie($question_array);
        $answer = $question_array[$question];
        write_cookie($question_array);
        var_dump($question_array);
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