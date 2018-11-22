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
        $this->database->save($data);
    }

    public function load($id) {
        $data = $this->database->load();
        return $data[$this->table_name][$id];
    }

    public function delete($id) {
        $data = $this->database->load();
        unset($data[$this->table_name][$id]);
        $this->database->save($data);
    }

}

/*
 * root
 *      [users][lochas@mail.ru] = ['name' => 'Sergej']
 */
$database = new Database("db.txt");
$model = new Model($database, "users");
$model->insertOrUpdate("lochas@mail.ru", "['name' => 'Sergej']");
/*
 *  $modelgirls
 *
 */
$modelGirls = new Model($database, 'girls');
$model->insertOrUpdate("gir1@mail.com", "['name' => 'Stacy']");
$model->insertOrUpdate("shemale@mail.th", "['name' => 'Tyrone']");

/*
 * $modelUsers
 *
 */
$modelUsers = new Model($database, '$users');
$model->insertOrUpdate("jons@mail.com", "['name' => 'Jonas']");
$model->insertOrUpdate("Staska@mail.th", "['name' => 'Stasys']");



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>

    </body>
</html>