<?php

Class User extends AbstractUser {

    private $model;

    public function __construct(\Database $db) {
        parent::__construct($db);
        $this->model = new Model($db, "User");
        $this->is_logged_in = $_SESSION['logged_in'] ?? false;
    }

    public function delete($email) {
        $model->delete($email);
    }

    public function login($email, $password) {
        $user = $this->model->load($email);
        if ($user) {
            if ($user['password'] == $password) {
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

    public function register($email, $password, $full_new) {
        $data = [
            'email' => $email,
            'password' => $password,
            'full_new' => $full_new
        ];

        $this->model->insertOrUpdate($email, $data);
    }

}
