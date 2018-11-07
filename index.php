<?php
$img = '/images/explosion.gif';
$link = 'https://www.google.com';
?>

<!DOCTYPE html>
<html>
    <head> 
        <title></title>
    </head>
    <body>
        <img src=<?php print $img; ?>>
        <img src=<?php print $img; ?>>
        <img src=<?php print $img; ?>>
        <img src=<?php print $img; ?>>

        <a href=<?php $link ?>>Linkas</a>
        <a href=<?php $link ?>>Linkas</a>
        <a href=<?php $link ?>>Linkas</a>
        <a href=<?php $link ?>>Linkas</a>
    </body>
</html>