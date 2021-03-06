<?php

class ModelTinderViews {

    protected $db;
    protected $table_name;
    protected $db_c;

    public function __construct(MysqlDatabase $db, $table_name) {
        $this->db = $db;
        $this->db_c = $db->getConnection();
        $this->table_name = $table_name;
        $this->init();
    }

    public function init() {
        $results = $this->db_c->query("SHOW TABLES LIKE '$this->table_name';");
        if ($results->rowCount() == 0) {
            $this->create();
            $this->init();
        }
    }

    public function create() {
        $sql = "CREATE TABLE IF NOT EXISTS $this->table_name(" .
                "id INT NOT NULL AUTO_INCREMENT PRIMARY KEY," .
                "email_user VARCHAR(255) NOT NULL," .
                "email_user_viewed VARCHAR(255) NOT NULL," .
                "created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP," .
                "updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"
                . ");";
        try {
            $this->db_c->exec($sql);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insert($email_user, $email_user_viewed) {
        $row = [
            'email_user' => $email_user,
            'email_user_viewed' => $email_user_viewed
        ];

        $sql = strtr('INSERT INTO @table ( @columns ) VALUES ( @column_binds );', [
            '@table' => $this->table_name,
            '@columns' => SQLBuilder::columns(array_keys($row)),
            '@column_binds' => SQLBuilder::binds(array_keys($row))
        ]);

        $query = $this->db_c->prepare($sql);
        foreach ($row as $column => $value) {
            $query->bindValue(SQLbuilder::bind($column), $value);
        }
        $query->execute();
        return $this->db_c->lastInsertId();
    }

    public function load($email_user) {
        $sql = strtr('SELECT * FROM @table WHERE @column = @column_bind;', [
            '@table' => $this->table_name,
            '@column' => SQLBuilder::column('email_user'),
            '@column_bind' => SQLBuilder::bind('email_user')
        ]);
        $query = $this->db_c->prepare($sql);
        $query->bindValue(SQLBuilder::bind('email_user'), $email_user);
        $query->execute();
        //$query->debugDumpParams();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function loadAll() {
        $sql = strtr('SELECT * FROM @table;', [
            '@table' => $this->table_name
        ]);
        $query = $this->db_c->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update() {

        /*
         * * To Do
         */
    }

    public function delete($email_user, $email_user_viewed) {

        $sql = strtr('DELETE FROM @table WHERE @column_with_bind AND @column_viewed_with_bind', [
            '@table' => $this->table_name,
            '@column_with_bind' => SQLBuilder::columnEqualBind('email_user'),
            '@column_viewed_with_bind' => SQLBuilder::columnEqualBind('email_user_viewed')
        ]);
        $query = $this->db_c->prepare($sql);
        $query->bindValue(SQLBuilder::bind('email_user'), $email_user);
        $query->bindValue(SQLBuilder::bind('email_user_bind'), $email_user_bind);
        return $query->execute();
    }

}
