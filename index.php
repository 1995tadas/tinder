<?php

class Dacikas {

    public function gautiNaujusMatavimus() {
        print "Nežinai, ką matuot";
    }

}

class TempDacikas extends Dacikas {

    public function gautiNaujusMatavimus() {
        print "Dabar yra " . rand(0, 20) . " C silumos";
    }

}

$dacikas = new TempDacikas;
$dacikas->gautiNaujusMatavimus();
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