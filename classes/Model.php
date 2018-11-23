<?php

Class Model {

    private $table_name;
    private $database;

    public function __construct(Database $database, $table_name) {
        $this->table_name = $table_name;
        $this->database = $database;
    }

    public function insertOrUpdate($id, $record) {
        $data = $this->database->load();
        $data[$this->table_name][$id] = $record;
        var_dump($record);
        $this->database->save($data);
    }

    public function load($id) {
        $data = $this->database->load();
        return $data[$this->table_name][$id] ?? null;
    }

    public function delete($id) {
        $data = $this->database->load();
        unset($data[$this->table_name][$id]);
        $this->database->save($data);
    }

}

?>
