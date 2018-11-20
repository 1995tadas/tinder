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

    public function setAge($amzius) {
        return $this->amzius = $amzius;
    }

    public function setEmail($email) {
        return $this->email = $email;
    }

    public function setName($vardas) {
        return $this->vardas = $vardas;
    }

    public function setPhoto($nuotrauka) {
        return $this->nuotrauka = $nuotrauka;
    }

    public function getAll() {
        return [
            'name' => $this->vardas,
            'age' => $this->amzius,
            'email' => $this->email,
            'photo' => $this->nuotrauka,
        ];
    }

    public function getPhoto() {
        return $this->nuotrauka;
    }

    public function getAge() {
        return $this->amzius;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

}

class Tinder {

    const COOKIE_NAME = 'tinder';

    private $girls;
    private $viewed;
    private $liked;
    private $disliked;

    public function __construct() {
        $this->girls = [];
        $this->viewed = [];
        $this->liked = [];
        $this->disliked = [];
    }

    public function girlAdd(Girl $girl) {
        $this->girls[] = $girl;
    }

    public function girlViewNext() {
        foreach ($this->girls as $girl) {
            if (!in_array($girl, $this->viewed)) {
                $this->viewed[] = $girl;
                return $girl;
            }
        }
    }

    public function girlViewLast() {
        if (empty($this->viewed)) {
            return $this->girlViewNext();
        } else {
            return end($this->viewed);
        }
    }

    public function girlLike() {
        
    }

    public function dataLoad() {
        $data = $_COOKIE[self::COOKIE_NAME] ?? false;

        if ($data) {
            $data = unserialize($data);
            $this->viewed = $data['viewed'] ?? [];
            $this->liked = $data['liked'] ?? [];
        }
    }

//Save data to cookies
    public function dataSave() {
        $data = [
            'viewed' => $this->viewed,
            'liked' => $this->liked
        ];
        setcookie(self::COOKIE_NAME, serialize($data), time() + (8504 * 40), '/');
    }

    public function dataClear() {
        setcookie(self::COOKIE_NAME, '', time() - 3600, '/');
    }

}

$tinder = new Tinder();
$tinder->girlAdd(new Girl('Antose', 28, 'Irma@gmail.com', 'http://www.prettygirlsgalaxy.com/wp-content/uploads/2017/07/Pretty-Girl-of-the-Day-Beautiful-Looking-Girl-Sdcvoice.jpg'));
$tinder->girlAdd(new Girl('Stefanija', 22, 'Stefanija@gmail.com', 'https://cdn.funpic.us/random_girl_from_north_mexico_coming_through-48-257773.jpg'));
$tinder->girlAdd(new Girl('Kazimiera', 22, 'Kazimiera@gmail.com', 'http://www.prettygirlsgalaxy.com/wp-content/uploads/2017/07/Pretty-Girl-of-the-Day-Beautiful-Looking-Girl-Sdcvoice.jpg'));

$tinder->dataLoad();

if (isset($_POST["button"])) {
    $viewed_girl = $tinder->girlViewNext();
    $tinder->dataSave();
} else {
    $viewed_girl = $tinder->girlViewLast();
}

if (!$viewed_girl) {
    $tinder->dataClear();
    var_dump('Viskas, Tu busi forever alone');
} else {
    var_dump($viewed_girl);
}
var_dump($tinder);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
            .tinder-icon {
                height:100px;
                width:100px;
                background-size:cover;
            }
            .tinder-icon.like {
                background-image: url(https://roneelprasad.files.wordpress.com/2014/05/tinder-like.png);

            }
            .tinder-icon.dislike {
                background-image: url(http://roneelprasad.files.wordpress.com/2014/05/tinder-nope.png);

            }
            .main-photo {
                height:300px;
                width:300px;
            }
        </style>
    </head>
    <body>
        <?php if ($viewed_girl): ?>
            <form action="index.php" method="POST">
                <img class="main-photo" src="<?php print $viewed_girl->getPhoto() ?>">
                <br/>
                <button class="tinder-icon like" name="button" value="like"/>
                <button class="tinder-icon dislike" name="button" value="dislike"/>
            </form>
        <?php endif; ?>
    </body>
</html>