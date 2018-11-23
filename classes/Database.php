<?php

class Database {

    private $file;

    public function __construct($file) {
        $this->file = $file;
        $this->init();
    }

    public function init() {

        if (!file_exists($this->file)) {
            file_put_contents($this->file, '');
        }
    }

    public function load() {
        return unserialize(file_get_contents($this->file));
    }

    public function save($data) {

        file_put_contents($this->file, serialize($data));
    }

    public function delete() {
        unlink($this->file);
    }

}

?>