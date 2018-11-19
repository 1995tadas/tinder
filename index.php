<?php

class Text {

    public $textas;

    public function __construct($textas) {
        $this->textas = $textas;
    }


}

$spausdink = new Text('„Kam to reikia!?
 Man patinka funkcijos”');
print $spausdink->textas;
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>

    </body>
</html>