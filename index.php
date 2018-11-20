<?php

class Dacikas {

    protected $pask_matavimai;

    public function gautiNaujusMatavimus() {
        print "Nežinai, ką matuot";
    }

}

class TempDacikas extends Dacikas {


    public function gautiNaujusMatavimus() {
        $this ->pask_matavimai = "Dabar yra " . rand(0, 20) . " C silumos";
        print $this->pask_matavimai;
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