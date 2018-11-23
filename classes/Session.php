<?php

class Session {

    private $usrep;
    private $is_logged_in;

    public function __construct(UserRepository $usrep) {
        $this->usrep = $usrep;
        $this->is_logged_in = $_SESSION['logged_in'] ?? false;
        session_start();
    }

    public function login($email, $password) {
        var_dump($email, $password);
        $user = $this->usrep->load($email);
        if ($user) {
            if ($user->getPassword() == $password) {
                $_SESSION['email'] = $email;
                $_SESSION['logged_in'] = true;
                $this->is_logged_in = true;
            }
        } else {
            var_dump("NERA USERIO");
        }
    }

    public function logout() {
        $this->is_logged_in = false;
        $_SESSION = [];
        session_destroy();
    }

    public function register($email, $password, $data) {
        if (!$this->usrep->load($email)) {

            $user = new User($email, $password, $data);
                        var_dump($email, $password, $data);
            $this->usrep->save($user);
        }
    }

    public function isLogggedin() {
        return $this->is_logged_in;
    }

}
