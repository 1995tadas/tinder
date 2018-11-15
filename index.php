<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == 'home') {
        $title = 'Home Page';
        $h1 = 'Sveiki atvyke';
    } elseif ($page == 'cv') {
        $title = 'Mano CV';
        $h1 = 'CV;';
    } elseif ($page == 'showcase') {
        $title = 'Mano Paroda';
        $h1 = 'Paroda:Skaičiuoklė';
    } else {
        $title = 'Fuck you';
        $h1 = 'Fuck you';
    };
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php print $title
            ?>
        </title>
        <style>
        </style>
    </head>
    <body>
        <h1>
            <?php print $h1 ?>
        </h1>
    </body>
</html>