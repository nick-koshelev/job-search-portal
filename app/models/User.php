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

    public function __construct(
        $username,
        $firstname,
        $surname,
        $email,
        $password,
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
    }

    public static function deserialize($data): User
    {
        return new User(
            $data['username'],
            $data['firstname'],
            $data['surname'],
            $data['email'],
            $data['password'],
            $data['id'] ?? null
        );
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
        if ($this->isUserExisted($user->username))
            throw new Exception("User with this username is already existed");

        $this->db->open();
        $this->db->insertData("users", [
            'username' => $user->username,
            'firstname' => $user->firstname,
            'surname' => $user->surname,
            'email' => $user->email,
            'password' => $user->password
        ]);
        $this->db->close();
    }

    public function updateUser(User $user)
    {
        if (!$this->isUserExisted($user->username))
            throw new Exception("Cannot find user");

        $this->db->open();
        $this->db->updateData("users", [
            'username' => $user->username,
            'firstname' => $user->firstname,
            'surname' => $user->surname,
            'email' => $user->email,
            'password' => $user->password,
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

    public function getByUsername($username): ?User
    {
        $this->db->open();
        $users = $this->db->getData("users", ["username" => $username]);
        $this->db->close();
        return isset($users[0]) ? User::deserialize($users[0]) : null;
    }

    private function isUserExisted($username): bool
    {
        $this->db->open();
        $existedUser = $this->getByUsername($username);
        $this->db->close();
        return (bool)$existedUser;
    }
}