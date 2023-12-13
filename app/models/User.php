<?php

namespace models;

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
        $image = null,
        $id = null
    )
    {
        if (!empty($id))
            $this->id = $id;
        $this->username = $username;
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->image = $image;
    }

    public static function serialize($data): User
    {
        return new User(
            $data["username"],
            $data["firstname"],
            $data["surname"],
            $data["email"],
            $data["password"],
            $data["image"] ?? null,
            $data["id"] ?? null
        );
    }

    public function deserialize(): array
    {
        return [
            "id" => $this->id,
            "username" => $this->username,
            "firstname" => $this->firstname,
            "surname" => $this->surname,
            "email" => $this->email,
            "password" => $this->password,
            "image" => $this->image,
        ];
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