<?php

namespace controllers;

use Exception;
use models\User;
use models\UserManager;

require_once "app/controllers/BaseController.php";
require_once "app/models/User.php";

class UserController extends BaseController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function indexAction()
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] !== "GET")
                throw new Exception();

            if (isset($_SESSION["userId"]) && $_SESSION["userId"]) {
                $userId = $_SESSION["userId"];
                $user = $this->userManager->getById($userId);
                if (!isset($user) || !$user)
                    throw new Exception();

                $vacancies = $this->userManager->getVacancies($userId);

                $this->render("My account", "app/views/user/index.php", [
                    "user" => $user,
                    "vacancies" => $vacancies
                ]);
            } else {
                throw new Exception();
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

            if (!$sessionId || $sessionId != $id)
                throw new Exception();

            $user = $this->userManager->getById($id);
            if (!isset($user) || !$user)
                throw new Exception();

            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $this->render("Edit account", "app/views/user/edit.php", [
                    "user" => $user
                ]);
            } else {
                try {
                    $userInput = [
                        "id" => $sessionId,
                        "username" => isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : null,
                        "firstname" => isset($_POST["firstname"]) ? htmlspecialchars($_POST["firstname"]) : null,
                        "surname" => isset($_POST["surname"]) ? htmlspecialchars($_POST["surname"]) : null,
                        "email" => isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : null,
                        "password" => isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : null,
                        "repeatPassword" => isset($_POST["repeatPassword"]) ? htmlspecialchars($_POST["repeatPassword"]) : null,
                    ];

                    if (!isset($_FILES["image"]) || $_FILES["image"]["error"] == UPLOAD_ERR_NO_FILE)
                    {
                        $userInput["image"] = $user->image;
                    } else if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                        $image64 = base64_encode(file_get_contents($_FILES["image"]["tmp_name"]));
                        $userInput["image"] = $image64;
                    } else {
                        throw new Exception("Error uploading image");
                    }

                    if (empty($userInput["username"]))
                        throw new Exception("Username is required");

                    if (empty($userInput["password"])) {
                        $userInput["password"] = $user->password;
                    } else if ($userInput["password"] !== $userInput["repeatPassword"]) {
                        throw new Exception("You repeated password incorrectly");
                    }

                    $user = User::deserialize($userInput);
                    $this->userManager->updateUser($user);
                    header("Location: /user");
                    exit();
                } catch (Exception $e) {
                    $errorMessage = $e->getMessage();
                    $this->render("Edit account", "app/views/user/edit.php", [
                        "errorMessage" => $errorMessage,
                        "user" => $user,
                    ]);
                }
            }
        } catch (Exception $e) {
            http_response_code(404);
            $this->render("404 Not found", "app/views/404.php");
        }
    }

    public function respondAction($vacancyId)
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] !== "POST")
                throw new Exception();

            $sessionId = $_SESSION["userId"] ?? null;

            if (!$sessionId)
                throw new Exception();

            $this->userManager->respondToVacancy($sessionId, $vacancyId);
            header("Location: /app/views/jobs/jobPage.php");
            exit();

        } catch (Exception $e) {
            http_response_code(404);
            $this->render("404 Not found", "app/views/404.php");
        }
    }
}