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
            $this->createBlogTable($db);
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
            "id" => "test",
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
            "id" => "test",
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
        $data = [
            "id" => "test",
            "user_id" => "test",
            "vacancy_id" => "test"
        ];

        $db->insertData($tableName, $data);
    }

    private function createCompanyTable($db)
    {
        $tableName = "companies";
        $columns = "id TEXT PRIMARY KEY, name TEXT, description TEXT, industry TEXT, location TEXT, website TEXT, contact_email TEXT, contact_phone TEXT, creator_user_id TEXT REFERENCES users(id)";
        $db->createTable($tableName, $columns);

        $data = [
            "id" => "test",
            "name" => "test",
            "description" => "test",
            "industry" => "test",
            "location" => "test",
            "website" => "test",
            "contact_email" => "test",
            "contact_phone" => "test",
            "creator_user_id" => "test",
        ];

        $db->insertData($tableName, $data);
    }
    private function createBlogTable($db)
    {
        $tableName = "blogs";
        $columns = "id TEXT PRIMARY KEY, title TEXT, content TEXT, author TEXT, publish_date TEXT, tags TEXT";
        $db->createTable($tableName, $columns);

        $data = [
            "id" => "test",
            "title" => "Sample Blog",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "author" => "John Doe",
            "publish_date" => "2023-01-01",
            "tags" => "technology, programming",
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