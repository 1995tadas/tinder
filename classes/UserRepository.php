<?php

Class UserRepository {

    private $db;
    private $model;

    public function __construct(Database $db) {
        $this->db = $db;
        $this->model = new Model($db, 'users');
    }

    public function save(User $user) {
        var_dump($user);
        $this->model->insertOrUpdate($user->getEmail(), $user);
    }

    public function load($email) {
        $this->model->load($email);
    }

}
