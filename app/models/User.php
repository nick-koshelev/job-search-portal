<?php

namespace models;

use DatabaseHelper;
use Exception;

class User
{
    public $id;

    public $username;

    public $firstname;

    public $surname;

    public $email;

    public $password;

    public $image;

    public function __construct(
        $username,
        $firstname,
        $surname,
        $email,
        $password,
        $image,
        $id = null
    )
    {
        if ($id)
            $this->id = $id;
        $this->username = $username;
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->image = $image;
    }

    public static function deserialize($data): User
    {
        return new User(
            $data["username"],
            $data["firstname"],
            $data["surname"],
            $data["email"],
            $data["password"],
            $data["image"],
            $data["id"] ?? null
        );
    }

    public function getImageType()
    {
        if (!isset($this->image))
            return false;

        $imageData = base64_decode($this->image);
        if ($imageData === false)
            return false;

        $imageInfo = getimagesizefromstring($imageData);
        if ($imageInfo === false || !isset($imageInfo["mime"]))
            return false;

        return $imageInfo["mime"];
    }
}

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
        $this->db->insertData("users", [
            "username" => $user->username,
            "firstname" => $user->firstname,
            "surname" => $user->surname,
            "email" => $user->email,
            "password" => $user->password,
            "image" => $user->image,
        ]);
        $this->db->close();
    }

    public function updateUser(User $user)
    {
        if (!$this->isUserExistById($user->id))
            throw new Exception("Cannot find user");

        $this->db->open();
        $this->db->updateData("users", [
            "username" => $user->username,
            "firstname" => $user->firstname,
            "surname" => $user->surname,
            "email" => $user->email,
            "password" => $user->password,
            "image" => $user->image,
        ], ["id" => $user->id]);
        $this->db->close();
    }

    public function getUsers(): array
    {
        $this->db->open();
        $dbUsers = $this->db->getData("users");
        $this->db->close();

        $users = [];
        foreach ($dbUsers as $index => $user) {
            $users[] = new User(
                $user["username"],
                $user["firstname"],
                $user["surname"],
                $user["email"],
                $user["password"],
                $user["image"],
                $user["id"]
            );
        }

        return $users;
    }

    public function getById($id): ?User
    {
        $this->db->open();
        $users = $this->db->getData("users", ["id" => $id]);
        $this->db->close();
        return isset($users[0]) ? User::deserialize($users[0]) : null;
    }

    public static function getUser($id): ?User
    {
        $db = new DatabaseHelper();
        $db->open();
        $users = $db->getData("users", ["id" => $id]);
        $db->close();
        return isset($users[0]) ? User::deserialize($users[0]) : null;
    }

    public function getByUsername($username): ?User
    {
        $this->db->open();
        $users = $this->db->getData("users", ["username" => $username]);
        $this->db->close();
        return isset($users[0]) ? User::deserialize($users[0]) : null;
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

    private function isUserExistById($id): bool
    {
        $this->db->open();
        $existedUser = $this->getById($id);
        $this->db->close();
        return (bool)$existedUser;
    }
}