<?php

class Girl {

    private $vardas;
    private $amzius;
    private $email;
    private $nuotrauka;

    public function __construct($vardas, $amzius, $email, $nuotrauka) {
        $this->vardas = $vardas;
        $this->amzius = $amzius;
        $this->email = $email;
        $this->nuotrauka = $nuotrauka;
    }

    public function set_name($vardas) {
        return $this->vardas = $vardas;
    }

    public function set_age($amzius) {
        return $this->amzius = $amzius;
    }

    public function set_email($email) {
        return $this->email = $email;
    }

    public function get_email() {
        return $this->email;
    }

    public function set_photo($nuotrauka) {
        return $this->nuotrauka = $nuotrauka;
    }

    public function get_all($vardas, $amzius, $email, $nuotrauka) {
        $this->vardas = $vardas;
        $this->amzius = $amzius;
        $this->email = $email;
        $this->nuotrauka = $nuotrauka;
        return [
            'name' => $this->vardas,
            'age' => $this->amzius,
            'email' => $this->email,
            'photo' => $this->nuotrauka,
        ];
    }

}

class Tinder {

    public $girls;
    public $viewed;
    public $liked;
    public $current;

    public function __construct() {
        $this->girls = [];
        $this->viewed = [];
        $this->liked = [];
        $this->current = [];
    }

    function girl_add(Girl $girl) {
        $this->girls[] = $girl;
    }

    function girl_destroy($email) {
        foreach ($this->girls as $idx => $girl) {
            if ($girl->getEmail() == $email) {
                unset($this->girls[$idx]);
            }
        }
    }

    function view_girl() {
        foreach ($this->girls as $girl) {
            if (in_array($girl, $this->viewed)) {
               return $girl;
            }
        }
    }

}

$tinder = new Tinder();
$irma = new Girl('Irma', 22, 'Irma@gmail.com', ' ');
$tinder->girl_add($irma);
$giedre = new Girl('Giedre', 23, 'Giedre@gmail.com', ' ');
$tinder->girl_add($giedre);
$pranas = new Girl('Pranas', 59, 'Pranas@gmail.com', 'I am a girl !!!');
$tinder->girl_add($pranas);
$new_girl = $tinder->view_girl();

var_dump($new_girl);
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