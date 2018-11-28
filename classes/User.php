<?php

Class User {

    private $email;
    private $data;

    public function __construct($email, $data) {
        $this->email = $email;
        $this->data = $data;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->getDataItem('password');
    }

    public function getFullName() {
        return $this->getDataItem('full_name');
    }

    public function getAge() {
        return $this->getDataItem('age');
    }

    public function getGender() {
        return $this->getDataItem('gender');
    }

    public function getPhoto() {
        return $this->getDataItem('photo');
    }

    public function setEmail($email) {
        return $this->data['email'] = $email;
    }

    public function setPassword($password) {
        return $this->data['password'] = $password;
    }

    public function setFullName($full_name) {
        return $this->data['full_name'] = $full_name;
    }

    public function setAge($age) {
        return $this->data['age'] = $age;
    }

    public function setGender($gender) {
        return $this->data['gender'] = $gender;
    }

    public function setPhoto($photo) {
        return $this->data['photo'] = $photo;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setDataItem($dataIndex, $dataValue) {
        return $this->data[$dataIndex] = $dataValue;
    }

    public function getDataItem($data_idx) {
        return $this->data[$data_idx] ?? null;
    }

}
