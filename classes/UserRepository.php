<?php

Class UserRepository {

    private $db;
    private $model;

    public function __construct(MysqlDatabase $db) {
        $this->db = $db;
        $this->model = new ModelUsers($db, 'users');
    }

    public function add(User $user) {
        $this->model->insert($user->getEmail(), $user->getData());
    }

    public function save(User $user) {
        return $this->model->insertOrUpdate($user->getEmail(), $user);
    }

    public function load($email) {
        $data = $this->model->load($email);
        if ($data) {
            return new User($email, $data);
        } else {
            return null;
        }
    }

    public function loadAll() {
        $users = [];
        $data_arr = $this->model->loadAll();
        foreach ($data_arr as $user_data) {
            $email = $user_data['email'];
            $users[$email] = new User($email, $user_data);
        }
        return $users;
    }

    public function update(User $user) {
        $data = [];
        $this->model->update($user->getEmail(), $user->getData());
    }

    public function delete(User $user) {
        $this->model->delete($user->getEmail());
    }

    public function deleteAll() {
        $this->model->deleteAll();
    }

}
