<?php

namespace models;

use DatabaseHelper;
use Exception;
use models\Company;

require_once "app/models/Company.php";

class UserManager
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseHelper();
    }

    public function addUser(User $user)
    {
        if ($this->isUserExistByUsername($user->username))
            throw new Exception("User with this username is already existed");

        $this->db->open();
        $this->db->insertData("users", $user->deserialize());
        $this->db->close();
    }

    public function updateUser(User $user)
    {
        if (!$this->isUserExistById($user->id))
            throw new Exception("Cannot find user");

        $this->db->open();
        $this->db->updateData("users", $user->deserialize(), ["id" => $user->id]);
        $this->db->close();
    }

    public function getUsers(): array
    {
        $this->db->open();
        $dbUsers = $this->db->getData("users");
        $this->db->close();

        $users = [];
        foreach ($dbUsers as $index => $user) {
            $users[] = User::serialize($user);
        }

        return $users;
    }

    public function getById($id): ?User
    {
        $this->db->open();
        $users = $this->db->getData("users", ["id" => $id]);
        $this->db->close();
        return isset($users[0]) ? User::serialize($users[0]) : null;
    }

    public static function getUser($id): ?User
    {
        $db = new DatabaseHelper();
        $db->open();
        $users = $db->getData("users", ["id" => $id]);
        $db->close();
        return isset($users[0]) ? User::serialize($users[0]) : null;
    }

    public function getByUsername($username): ?User
    {
        $this->db->open();
        $users = $this->db->getData("users", ["username" => $username]);
        $this->db->close();
        return isset($users[0]) ? User::serialize($users[0]) : null;
    }

    public function respondToVacancy($userId, $vacancyId)
    {
        $this->db->open();
        $this->db->insertData("user_vacancy", [
            "user_id" => $userId,
            "vacancy_id" => $vacancyId
        ]);
        $this->db->close();
    }

    public function getVacancies($userId): ?array
    {
        $this->db->open();
        $vacancyIds = $this->db->getData("user_vacancy", ["user_id" => $userId]);
        $this->db->close();

        if (empty($vacancyIds))
            return null;

        $this->db->open();
        $data = array_map(function ($vacancy) {
            return $vacancy["vacancy_id"];
        }, $vacancyIds);
        $vacancies = $this->db->getData("vacancies", ["id" => $data]);
        $this->db->close();

        return $vacancies ?? null;
    }

    public function getCreatedCompanies($userId): ?array
    {
        $this->db->open();
        $createdCompanies = $this->db->getData("companies", ["creator_user_id" => $userId]);
        $this->db->close();

        $result = [];
        foreach($createdCompanies as $key => $companyData)
        {
            $result[] = Company::serialize($companyData);
        }

        return $result ?? null;
    }

    public static function isUserLoggedIn(): bool
    {
        return isset($_SESSION["userId"]);
    }

    private function isUserExistByUsername($username): bool
    {
        $this->db->open();
        $existedUser = $this->getByUsername($username);
        $this->db->close();
        return (bool)$existedUser;
    }

    public function isUserExistById($id): bool
    {
        $this->db->open();
        $existedUser = $this->getById($id);
        $this->db->close();
        return (bool)$existedUser;
    }
}