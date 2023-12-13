<?php

namespace controllers;

use Exception;
use models\Company;
use models\CompanyManager;
use models\User;
use models\UserManager;

require_once "app/controllers/BaseController.php";
require_once "app/models/Company.php";
require_once "app/models/CompanyManager.php";
require_once "app/models/User.php";
require_once "app/models/UserManager.php";

class CompanyController extends BaseController
{
    private $companyManager;

    private $userManager;

    public function __construct()
    {
        $this->companyManager = new CompanyManager();
        $this->userManager = new UserManager();
    }

    public function indexAction()
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] !== "GET")
                throw new Exception();

            $sessionId = $_SESSION["userId"] ?? null;

            $companies = $this->companyManager->getCompanies();

            $this->render("Companies", "app/views/company/index.php", [
                "companies" => $companies,
                "userId" => $sessionId
            ]);
        } catch (Exception $e) {
            http_response_code(404);
            $this->render("404 Not found", "app/views/404.php");
        }
    }

    public function detailsAction($id)
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] !== "GET")
                throw new Exception();

            $company = $this->companyManager->getCompany($id);
            if (empty($company))
                throw new Exception();

            $sessionId = $_SESSION["userId"] ?? null;

            $this->render($company->name, "app/views/company/details.php", [
                "company" => $company,
                "userId" => $sessionId
            ]);
        } catch (Exception $e) {
            http_response_code(404);
            $this->render("404 Not found", "app/views/404.php");
        }
    }

    public function createAction()
    {
        try {
            $sessionId = $_SESSION["userId"] ?? null;

            if (empty($sessionId) || !$this->userManager->isUserExistById($sessionId))
                throw new Exception();

            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $this->render("Create company", "app/views/company/create.php");
            } else {
                $userInput = [
                    "name" => isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : null,
                    "description" => isset($_POST["description"]) ? htmlspecialchars($_POST["description"]) : null,
                    "industry" => isset($_POST["industry"]) ? htmlspecialchars($_POST["industry"]) : null,
                    "location" => isset($_POST["location"]) ? htmlspecialchars($_POST["location"]) : null,
                    "website" => isset($_POST["website"]) ? htmlspecialchars($_POST["website"]) : null,
                    "contact_email" => isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : null,
                    "contact_phone" => isset($_POST["phone"]) ? htmlspecialchars($_POST["phone"]) : null,
                    "creator_user_id" => $sessionId,
                ];

                $this->companyManager->createCompany(Company::serialize($userInput));
                header("Location: /user");
                exit();
            }
        } catch (Exception $e) {
            http_response_code(404);
            $this->render("404 Not found", "app/views/404.php");
        }
    }

    public function editAction($id)
    {
        try {
            $sessionId = $_SESSION["userId"] ?? null;

            if (empty($sessionId) || !$this->userManager->isUserExistById($sessionId))
                throw new Exception();

            $company = $this->companyManager->getCompany($id);
            if (empty($company) || $company->creatorUserId != $sessionId)
                throw new Exception();

            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $this->render($company->name, "app/views/company/edit.php", [
                    "company" => $company
                ]);
            } else {
                $userInput = [
                    "id" => $company->id,
                    "name" => isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : null,
                    "description" => isset($_POST["description"]) ? htmlspecialchars($_POST["description"]) : null,
                    "industry" => isset($_POST["industry"]) ? htmlspecialchars($_POST["industry"]) : null,
                    "location" => isset($_POST["location"]) ? htmlspecialchars($_POST["location"]) : null,
                    "website" => isset($_POST["website"]) ? htmlspecialchars($_POST["website"]) : null,
                    "contact_email" => isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : null,
                    "contact_phone" => isset($_POST["phone"]) ? htmlspecialchars($_POST["phone"]) : null,
                    "creator_user_id" => $sessionId
                ];

                $company = Company::serialize($userInput);
                $this->companyManager->editCompany($company);
                header("Location: /company/details?id=" . $company->id);
                exit();
            }
        } catch (Exception $e) {
            http_response_code(404);
            $this->render("404 Not found", "app/views/404.php");
        }
    }

    public function deleteAction($id)
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] !== "POST")
                throw new Exception();

            $sessionId = $_SESSION["userId"] ?? null;

            if (empty($sessionId) || !$this->userManager->isUserExistById($sessionId))
                throw new Exception();

            $company = $this->companyManager->getCompany($id);
            if (empty($company) || $company->creatorUserId != $sessionId)
                throw new Exception();

            $this->companyManager->deleteCompany($id);
            header("Location: /user");
            exit();

        } catch (Exception $e) {
            http_response_code(404);
            $this->render("404 Not found", "app/views/404.php");
        }
    }
}