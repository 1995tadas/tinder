<?php

Class User {

    private $email;
    private $password;
    private $data;

    public function __construct($email, $password, $data) {
        $this->email = $email;
        $this->password = $password;
        $this->data = $data;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getData() {
        return $this->data;
    }

    public function setDataItem($dataIndex, $dataValue) {
        return $this->data[$dataIndex] = $dataValue;
    }

    public function getDataItem($data_idx) {
        return $this->data[$data_idx];
    }
    
}
