<?php

require_once 'database/DatabaseHelper.php';

class Database
{
    private $dbFilePath = "database/database.db";

    public function init()
    {
        if (!file_exists($this->dbFilePath)) {
            $db = new DatabaseHelper($this->dbFilePath);
            $this->createUsersTable($db);
            $this->createAdminsTable($db);
            $db->close();
        }
    }

    private function createUsersTable($db)
    {
        $tableName = "users";
        $columns = "id INTEGER PRIMARY KEY, username TEXT NOT NULL, firstname TEXT, surname TEXT, email TEXT, password TEXT NOT NULL";
        $db->createTable($tableName, $columns);
    }

    private function createAdminsTable($db)
    {
        $tableName = "roles";
        $columns = "id INTEGER PRIMARY KEY, username TEXT NOT NULL, password TEXT NOT NULL";
        $db->createTable($tableName, $columns);

        $data = [
            "username" => "admin",
            "password" => "admin",
        ];

        $db->insertData($tableName, $data);
    }
}