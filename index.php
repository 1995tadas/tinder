<?php
if (isset($_POST['tekstas'])) {
    $skaicius = $_POST['tekstas'];
    if (strlen($skaicius) > 0) {
        $kvadratas = pow($skaicius, 2);
    } else {
        $kvadratas = "Input negali buti tuscias!!!";
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
        <form action = "index.php" method ="POST">
            Ka pakelti kvadratu:
            <input name="tekstas" type="text"/>
            <input type="submit"/>
        </form>
        <?php if (isset($kvadratas)): ?>
            <h1><?php print $kvadratas ?></h1>
        <?php endif; ?>
    </body>
</html>