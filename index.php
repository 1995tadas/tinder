<?php
define('DEBUG', true);

require_once 'classes/abstracts/Model.php';
require_once 'classes/SQLBuilder.php';
require_once 'classes/MysqlDatabase.php';
require_once 'classes/UserRepository.php';
require_once 'classes/models/ModelUsers.php';
require_once 'classes/models/ModelTinderData.php';
require_once 'functions/Core.php';
require_once 'classes/Session.php';
require_once 'classes/User.php';
require_once 'classes/Tinder.php';

$database = new MysqlDatabase('root', '', 'localhost', 'tinder');
$repository = new UserRepository($database, 'Users');
$session = new Session($repository);
$message = null;
$data = [];

$page = [
    'form_errors' => [],
    'messages' => [],
    'viewed_user' => false,
    'matches' => [],
];

//register
if (isset($_POST['register-submit'])) {

    $inputs = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_EMAIL,
        'password' => FILTER_DEFAULT,
        'repassword' => FILTER_DEFAULT,
        'age' => FILTER_SANITIZE_NUMBER_INT,
        'full_name' => FILTER_SANITIZE_STRING,
        'gender' => FILTER_SANITIZE_STRING
    ]);

    if ($inputs['password'] == $inputs['repassword']) {
        $photo = $_FILES['photo'] ?? false;
        $target_path = save_photo($_FILES['photo']);
        if ($target_path) {
            $data['photo'] = $target_path;
            $data['full_name'] = $inputs['full_name'];
            $data['age'] = $inputs['age'];
            $data['gender'] = $inputs['gender'];

            if ($session->register($inputs['email'], $inputs['password'], $data)) {
                $page['messages'][] = "Jūs užsiregistravote sėkmingai";
            } else {
                $page['form_errors'][] = "Toks vartotojas jau yra.";
            }
        } else {
            $page['form_errors'][] = "Kažkas blogai su failu ";
        }
    } else {
        $page['form_errors'][] = "Įvesti slaptažodžiai nevienodi";
    }
}
//login
if (isset($_POST['login-submit'])) {
    $inputs = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_EMAIL,
        'password' => FILTER_DEFAULT,
    ]);

    if ($session->login($inputs['email'], $inputs['password'])) {
        $page['messages'][] = "Sekmingai prisijungete";
    } else {
        $page['form_errors'][] = "Patikrinkite ivestus duomenis.";
    }
}

//logout
if (isset($_POST['login-logout'])) {
    $session->logout();
}
//login-check
if ($session->isLoggedin()) {
    $tinder = new Tinder($database, $repository, $session);
    $message = "Jūs esate prisijungęs";
    $action = $_POST['action'] ?? false;
    if ($action) {
        if ($action == 'like') {
            $tinder->userLike();
            $page['viewed_user'] = $tinder->userViewNext();
        } elseif ($action == 'dislike') {
            $tinder->userDislike();
            $page['viewed_user'] = $tinder->userViewNext();
        }
    } else {
        $page['viewed_user'] = $tinder->userViewLast();
    }

    $page['matches'] = $tinder->getMatches();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Codeacedemy Tinder</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
    <body>

        <?php if (!$session->isLoggedin()): ?>
            <input type='checkbox' id='form-switch'>
            <form id='register-form' enctype="multipart/form-data" action="index.php" method='post'>
                <input name="full_name" type="text" placeholder="Vardas ir pavarde" required>
                <input name="email" type="email" placeholder="El.paštas" required>
                <input name="password" type="password" placeholder="Slaptažodis" required>
                <input name="repassword"  type="password" placeholder="Pakartokite slaptažodį" required>
                <input name ="age" type="number" placeholder="Amžius" required >
                Pasirinkite nuotrauką "jpg" ar "png" formatu <input name="photo" type="file" required> 
                <p>Pasirinkite savo lytį:</p>
                <input class ="radio" name="gender" type="radio" value="m" required>Vyras<br>
                <input class ="radio" name="gender" type="radio" value="w" required>Moteris<br>
                <button name ="register-submit" type='submit'>Registruokis</button>
                <label for='form-switch'>Prisijungimas</label>
            </form>
            <form id='login-form' action="index.php" method='post'>
                <input name="email" type="text" placeholder="El.paštas" required>
                <input name="password" type="password" placeholder="Slaptažodis" required>
                <button name="login-submit"  type='submit'>Prisijunk</button>
                <label for='form-switch'><span>Registracija</span></label>
            </form>
        <?php endif; ?>
        <?php if ($session->isLoggedin()): ?>
            <form id='logout-form' action="index.php" method='post'>
                <button class='logout' name="login-logout"  type='submit'>Atsijunk</button>
            </form>
        <?php endif; ?>

        <?php foreach ($page['messages'] as $message): ?>
            <div class="messages-wrapper">
                <span class="message"><?php print $message ?></span>
            </div>
        <?php endforeach; ?>

        <?php foreach ($page['form_errors'] as $error): ?>
            <div class="errors-wrapper">
                <span class="error"><?php print $error ?></span>
            </div>
        <?php endforeach; ?>

        <?php if ($session->isLoggedin()): ?>
            <?php if ($page['viewed_user']): ?>
                <form action="index.php" method="POST">
                    <img class="main-photo" src="<?php print $page['viewed_user']->getDataItem('photo') ?>">
                    <h1><?php print $page['viewed_user']->getDataItem('full_name') ?></h1>
                    <p><?php print $page['viewed_user']->getDataItem('age') ?></p>
                    <button class="tinder-icon like" name="action" value="like"></button>
                    <button class="tinder-icon dislike" name="action" value="dislike"></button> 
                </form>
            <?php else: ?>
                <h1 class="messages-wrapper"> Vartotujų daugiau nera</h1>
            <?php endif; ?>
            <?php if (!empty($page['matches'])): ?>
                <div class="tinder">
                    <h1>Matches:</h1>
                    <?php foreach (($page['matches']) as $user): ?>
                        <p><?php print ($user->getDataItem('full_name')) ?></p>
                        <img src="<?php print $user->getDataItem('photo') ?>">
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </body>