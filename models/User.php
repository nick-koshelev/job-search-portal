<?php

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
        $password
    )
    {
        $this->username = $username;
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
    }

    public static function deserialize($data)
    {
        return new User(
            $data['username'],
            $data['firstname'],
            $data['surname'],
            $data['email'],
            $data['password']
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
        $this->db->open();
        $existedUser = $this->getByUsername($user->username);
        $this->db->close();

        if ($existedUser) {
            throw new Exception("User with this username is already existed");
        }

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

    public function getUsers()
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
                $user["password"]
            );
        }

        return $users;
    }

    public function getByUsername($username)
    {
        $this->db->open();
        $users = $this->db->getData("users", ["username" => $username]);
        $this->db->close();
        return isset($users[0]) ? User::deserialize($users[0]) : null;
    }
}