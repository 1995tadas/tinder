<?php

class Session {

    private $usrep;
    private $is_logged_in;

    public function __construct(UserRepository $usrep) {
        session_start();
        $this->usrep = $usrep;
        $this->is_logged_in = $_SESSION['logged_in'] ?? false;
        
    }
    

    public function login($email, $password) {
        var_dump($this->usrep->load($email));
        $user = $this->usrep->load($email);
        if ($user) {
            if ($user->getPassword() == $password) {
                $_SESSION['email'] = $email;
                $_SESSION['logged_in'] = true;
                $this->is_logged_in = true;
            }
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

    public function getCurrentUser() {
        if ($this->isLogggedin()) {
            return $this->usrep->load($_SESSION['email']);
        }
    }

}
