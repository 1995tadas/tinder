<?php

class Dacikas {

    protected $pask_matavimai;

    /*
     * isspausdinti $pask_matavimai
     */

    public function gautiNaujusMatavimus() {
        if ($this->pask_matavimai) {
            print $this->pask_matavimai;
        } else {
            print "Nežinai, ką matuot <br>";
        }
    }

}

class TempDacikas extends Dacikas {

    /**
     * Nustatyti $pask_matavimai ir isspausdinti su parentu
     * @return type
     */
    public function gautiNaujusMatavimus() {

        $this->pask_matavimai = "Dabar yra " . rand(0, 20) . " C silumos <br>";
        parent::gautiNaujusMatavimus();
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