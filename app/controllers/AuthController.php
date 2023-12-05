<?php

namespace controllers;
use Exception;
use models\User;
use models\UserManager;

require_once "app/models/User.php";
require_once "app/controllers/BaseController.php";

class AuthController extends BaseController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function registerAction()
    {
        if (isset($_SESSION["userId"]) && $_SESSION["userId"]) {
            header("Location: /");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $this->render("Registration", "app/views/auth/register.php");
        } else {
            try {
                $userInput = [
                    "username" => isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : null,
                    "firstname" => isset($_POST["firstname"]) ? htmlspecialchars($_POST["firstname"]) : null,
                    "surname" => isset($_POST["surname"]) ? htmlspecialchars($_POST["surname"]) : null,
                    "email" => isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : null,
                    "password" => isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : null,
                    "repeatPassword" => isset($_POST["repeatPassword"]) ? htmlspecialchars($_POST["repeatPassword"]) : null,
                ];

                if ($userInput["username"] === "")
                    throw new Exception("Username is required");
                if ($userInput["password"] === "")
                    throw new Exception("Password is required");

                if ($userInput["password"] !== $userInput["repeatPassword"])
                    throw new Exception("You repeated password incorrectly");

                $user = User::deserialize($userInput);
                $this->userManager->addUser($user);
                $user = $this->userManager->getByUsername($user->username);
                $_SESSION["userId"] = $user->id;

                header("Location: /");
                exit();
            } catch (Exception $e) {
                $errorMessage = $e->getMessage();
                $this->render("Registration", "app/views/auth/register.php", [
                    "errorMessage" => $errorMessage,
                    "userInput" => $userInput,
                ]);
            }
        }
    }

    public function loginAction()
    {
        if (isset($_SESSION["userId"]) && $_SESSION["userId"]) {
            header("Location: /");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $this->render("Registration", "app/views/auth/login.php");
        } else {
            $userInput = [
                "username" => isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : null,
                "password" => isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : null
            ];
            $user = $this->userManager->getByUsername($userInput["username"]);
            if ($user && $user->password == $userInput["password"]) {
                $_SESSION["userId"] = $user->id;
                header("Location: /");
                exit();
            } else {
                $errorMessage = "Wrong username or password";
                $this->render("Registration", "app/views/auth/login.php", [
                    "errorMessage" => $errorMessage,
                    "userInput" => $userInput,
                ]);
            }
        }
    }

    public function logoutAction()
    {
        unset($_SESSION["userId"]);
        header("Location: /");
        exit();
    }
}