<?php
session_start();
require 'classes/Database.php';
require 'classes/Model.php';
require 'classes/abstract/AbstractUser.php';
require 'classes/User.php';
$db = new Database("db.txt");
$user = new User($db);
$tekstas = null;


//register
if (isset($_POST['register-submit'])) {

    $username = $_POST['register-username'];
    $email = $_POST['register-email'];
    $password = $_POST['register-password'];
    $repassword = $_POST['register-repassword'];
    if ($password === $repassword) {

        $user->register($email, $password, $username);
        $tekstas = "Jus uzsiregistravote sekmingai";
    } else {
        $tekstas = "Ivesti slaptazodžiai nevienodi";
    }
}
//login
if (isset($_POST['login-submit'])) {
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];
    $user->login($email, $password);
}

//logout
if (isset($_POST['login-logout'])) {
    $user->logout();
}
//login-check
if ($user->isLogggedin()) {
    $tekstas = "Jus esate prisijunges";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
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

        </style>
    </head>
    <body>
        <?php if (!($user->isLogggedin())): ?>
            <input type='checkbox' id='form-switch'>
            <form id='register-form' action="index.php" method='post'>
                <input name="register-username" type="text" placeholder="Username" required>
                <input name="register-email" type="email" placeholder="Email" required>
                <input name="register-password" type="password" placeholder="Password" required>
                <input name="register-repassword"  type="password" placeholder="Re Password" required>
                <button name ="register-submit" type='submit'>Registruokis</button>
                <label for='form-switch'>Prisijungimas</label>
            </form>
            <form id='login-form' action="index.php" method='post'>
                <input name="login-email" type="text" placeholder="Email" required>
                <input name="login-password" type="password" placeholder="Password" required>
                <button name="login-submit"  type='submit'>Prisijunk</button>
                <label for='form-switch'><span>Registracija</span></label>
            </form>
        <?php endif; ?>
        <?php if (($user->isLogggedin())): ?>
            <form id='logout-form' action="index.php" method='post'>
                <button name="login-logout"  type='submit'>Atsijunk</button>
            </form>
        <?php endif; ?>
        <h1>
            <?php print $tekstas ?>
        </h1>

    </body>
</html>
