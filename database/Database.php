<?php

require_once 'database/DatabaseHelper.php';

class Database
{
    public function init()
    {
        if (!file_exists(DatabaseHelper::$dbFilePath)) {
            $db = new DatabaseHelper();
            $db->open();
            $this->createUsersTable($db);
            $this->createAdminsTable($db);
            $db->close();
        }
    }

    private function createUsersTable($db)
    {
        $tableName = "users";
        $columns = "id TEXT PRIMARY KEY, username TEXT NOT NULL, firstname TEXT, surname TEXT, email TEXT, password TEXT NOT NULL";
        $db->createTable($tableName, $columns);
        $data = [
            "username" => "test",
            "password" => "test"
        ];

        $db->insertData($tableName, $data);
    }

    private function createAdminsTable($db)
    {
        $tableName = "admins";
        $columns = "id TEXT PRIMARY KEY, username TEXT NOT NULL, password TEXT NOT NULL";
        $db->createTable($tableName, $columns);

        $data = [
            "username" => "admin",
            "password" => "admin",
        ];

        $db->insertData($tableName, $data);
    }
}