<?php

namespace models;

class Company
{
    public $id;

    public $name;

    public $description;

    public $industry;

    public $location;

    public $website;

    public $contactEmail;

    public $contactPhone;

    public $creatorUserId;

    public function __construct(
        $name,
        $description,
        $industry,
        $location,
        $website,
        $contactEmail,
        $contactPhone,
        $id = null,
        $creatorUserId = null
    )
    {
        if (!empty($id))
            $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->industry = $industry;
        $this->location = $location;
        $this->website = $website;
        $this->contactEmail = $contactEmail;
        $this->contactPhone = $contactPhone;
        if (!empty($creatorUserId))
            $this->creatorUserId = $creatorUserId;
    }

    public static function serialize($data): Company
    {
        return new Company(
            $data["name"],
            $data["description"],
            $data["industry"],
            $data["location"],
            $data["website"],
            $data["contact_email"],
            $data["contact_phone"],
            $data["id"] ?? null,
            $data["creator_user_id"] ?? null
        );
    }

    public function deserialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "industry" => $this->industry,
            "location" => $this->location,
            "website" => $this->website,
            "contact_email" => $this->contactEmail,
            "contact_phone" => $this->contactPhone,
            "creator_user_id" => $this->creatorUserId,
        ];
    }
}