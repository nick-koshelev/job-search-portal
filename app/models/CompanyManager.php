<?php

namespace models;

use DatabaseHelper;
use Exception;

class CompanyManager
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseHelper();
    }

    public function createCompany(Company $company)
    {
        $this->db->open();
        $this->db->insertData("companies", $company->deserialize());
        $this->db->close();
    }

    public function editCompany(Company $company)
    {
        $this->db->open();
        $this->db->updateData("companies", $company->deserialize(), ["id" => $company->id]);
        $this->db->close();
    }

    public function getCompanies(): array
    {
        $this->db->open();
        $dbCompanies = $this->db->getData("companies");
        $this->db->close();

        $companies = [];
        foreach ($dbCompanies as $index => $company) {
            $companies[] = Company::serialize($company);
        }

        return $companies;
    }

    public function getCompany($id): ?Company
    {
        $this->db->open();
        $companies = $this->db->getData("companies", ["id" => $id]);
        $this->db->close();
        return isset($companies[0]) ? Company::serialize($companies[0]) : null;
    }

    public function deleteCompany($id)
    {
        $this->db->open();
        $this->db->deleteData("companies", ["id" => $id]);
        $this->db->close();
    }
}