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
            $this->createVacancyTable($db);
            $this->createUserVacancyTable($db);
            $this->createCompanyTable($db);
            //$this->createAdminsTable($db);
            $db->close();
        }
    }

    private function createUsersTable($db)
    {
        $tableName = "users";
        $columns = "id TEXT PRIMARY KEY, username TEXT NOT NULL, firstname TEXT, surname TEXT, email TEXT, password TEXT NOT NULL, image TEXT";
        $db->createTable($tableName, $columns);
        $data = [
            "username" => "test",
            "password" => "test"
        ];

        $db->insertData($tableName, $data);
    }

    private function createVacancyTable($db)
    {
        $tableName = "vacancies";
        $columns = "id TEXT PRIMARY KEY, job_title TEXT, company TEXT, location TEXT, description TEXT, job_type TEXT, salary TEXT";
        $db->createTable($tableName, $columns);
        $data = [
            "job_title" => "test",
            "company" => "test",
            "location" => "test",
            "description" => "test",
            "job_type" => "test",
            "salary" => "test"
        ];

        $db->insertData($tableName, $data);
    }

    private function createUserVacancyTable($db)
    {
        $tableName = "user_vacancy";
        $columns = "id TEXT PRIMARY KEY, user_id TEXT REFERENCES users(id), vacancy_id TEXT REFERENCES vacancies(id)";
        $db->createTable($tableName, $columns);
    }

    private function createCompanyTable($db)
    {
        $tableName = "companies";
        $columns = "id TEXT PRIMARY KEY, name TEXT, description TEXT, industry TEXT, location TEXT, website TEXT, contact_email TEXT, contact_phone TEXT";
        $db->createTable($tableName, $columns);

        $data = [
            "name" => "test",
            "description" => "test",
            "industry" => "test",
            "location" => "test",
            "website" => "test",
            "contact_email" => "test",
            "contact_phone" => "test"
        ];

        $db->insertData($tableName, $data);
    }

//    private function createAdminsTable($db)
//    {
//        $tableName = "admins";
//        $columns = "id TEXT PRIMARY KEY, username TEXT NOT NULL, password TEXT NOT NULL";
//        $db->createTable($tableName, $columns);
//
//        $data = [
//            "username" => "admin",
//            "password" => "admin",
//        ];
//
//        $db->insertData($tableName, $data);
//    }
}