<?php
require 'classes/Database.php';
require 'classes/Model.php';
require 'classes/Tinder.php';
require 'classes/Session.php';
require 'classes/abstract/AbstractUser.php';
require 'classes/User.php';
require 'classes/UserRepository.php';
$db = new Database("db.txt");
$repository = new UserRepository($db);
$session = new Session($repository);
$message = null;
$data = [];
//register

if (isset($_POST['register-submit'])) {
    $username = $_POST['register-username'] ?? false;
    $email = $_POST['register-email'] ?? false;
    $password = $_POST['register-password'] ?? false;
    $repassword = $_POST['register-repassword'] ?? false;
    $age = $_POST['register-age'] ?? false;
    $gender = $_POST['register-gender'] ?? false;

    if ($password == $repassword) {
        $photo = $_FILES['photo'] ?? false;
        if ($photo['error'] == 0) {
            $path = basename($photo['name']);
            $pic = explode('.', $path);
            if ((end($pic)) == 'jpg' || (end($pic)) == 'jpeg' || (end($pic)) == 'png') {
                $target_dir = 'photos';
                $target_fname = time() . $photo['name'];
                $target_path = $target_dir . '/' . $target_fname;
                if (move_uploaded_file($photo['tmp_name'], $target_path)) {
                    $data['photo'] = $target_path;
                    $data['username'] = $username;
                    $data['age'] = $age;
                    $data['gender'] = $gender;
                    print "Failas sekmingai ikeltas";
                    $session->register($email, $password, $data);
                    $message = "Jus uzsiregistravote sekmingai";
                } else {
                    print "Kazkas blogai su failu ";
                }
            } else {
                print "Netinkamas failo formatas";
            }
        }
    } else {
        $message = "Ivesti slaptazodžiai nevienodi";
    }
}
//login
if (isset($_POST['login-submit'])) {
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];
    $session->login($email, $password);
}

//logout
if (isset($_POST['login-logout'])) {
    $session->logout();
}
//login-check
if ($session->isLogggedin()) {
    $message = "Jus esate prisijunges";
    $tinder = new Tinder($repository, $session);
    $action = $_POST['action'] ?? false;
    if ($action) {
        if ($action == 'like') {
            $tinder->userLike();
            $viewed_user = $tinder->userViewNext();
            $tinder->dataSave();
        } elseif ($action == 'dislike') {
            $viewed_user = $tinder->userViewNext();
            $tinder->dataSave();
        }
    } else {
        $viewed_user = $tinder->userViewLast();
    }
    
    $matches = $tinder->getMatches();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
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
            display {
                display:inline;
            }
            .tinder img {
                height:50px;
                width:50px; 
            }

            form {
                margin:0 auto;
                width:300px
            }
            input {
                margin-bottom:3px;
                padding:10px;
                width: 100%;
                border:1px solid #CCC
            }
            button {
                padding:10px
            }
            label {
                cursor:pointer
            }
            #form-switch {
                display:none
            }
            #register-form {
                display:none
            }
            #form-switch:checked~#register-form {
                display:block
            }
            #form-switch:checked~#login-form {
                display:none
            }
            .radio {
                width:auto;
            }

        </style>
    </head>
    <body>

        <?php if (!$session->isLogggedin()): ?>
            <input type='checkbox' id='form-switch'>
            <form id='register-form' enctype="multipart/form-data" action="index.php" method='post'>
                <input name="register-username" type="text" placeholder="Vardas" required>
                <input name="register-email" type="email" placeholder="El.paštas" required>
                <input name="register-password" type="password" placeholder="Slaptažodis" required>
                <input name="register-repassword"  type="password" placeholder="Pakartokite slaptažodį" required>
                <input name ="register-age" type="number" placeholder="Amžius" required >
                Pasirinkite nuotrauką "jpg" ar "png" formatu <input name="photo" type="file" required> 
                <p>Pasirinkite savo lytį:</p>
                <input class ="radio" name="register-gender" type="radio" value="men" required>Vyras<br>
                <input class ="radio" name="register-gender" type="radio" value="women" required>Moteris<br>
                <button name ="register-submit" type='submit'>Registruokis</button>
                <label for='form-switch'>Prisijungimas</label>
            </form>
            <form id='login-form' action="index.php" method='post'>
                <input name="login-email" type="text" placeholder="El.paštas" required>
                <input name="login-password" type="password" placeholder="Slaptažodis" required>
                <button name="login-submit"  type='submit'>Prisijunk</button>
                <label for='form-switch'><span>Registracija</span></label>
            </form>
        <?php endif; ?>
        <?php if ($session->isLogggedin()): ?>
            <form id='logout-form' action="index.php" method='post'>
                <button name="login-logout"  type='submit'>Atsijunk</button>
            </form>
        <?php endif; ?>
        <h1>
            <?php print $message ?>
        </h1>

        <?php if ($session->isLogggedin()): ?>
            <?php if ($viewed_user): ?>
                <form action="index.php" method="POST">
                    <img class="main-photo" src="<?php print $viewed_user->getDataItem('photo') ?>">
                    <h1><?php print $viewed_user->getDataItem('username') ?></h1>
                    <p><?php print $viewed_user->getDataItem('age') ?></p>
                    <button class="tinder-icon like" name="action" value="like"></button>
                    <button class="tinder-icon dislike" name="action" value="dislike"></button> 
                </form>
            <?php endif; ?>
            <?php if (!empty($matches)): ?>
                <div class="tinder">
                    <h1>Matches:</h1>
                    <?php foreach ($matches as $user): ?>
                        <p><?php print ($user->getDataItem('username')) ?></p>
                        <img src="<?php print $user->getDataItem('photo') ?>">
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </body>

