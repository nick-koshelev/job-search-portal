<?php

require_once "models/User.php";

class AuthController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function registerAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            require("views/auth/register.php");
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
                $_SESSION["user"] = $user;

                header("Location: /");
                exit();
            } catch (Exception $e) {
                $errorMessage = $e->getMessage();
                require("views/auth/register.php");
            }
        }
    }

    public function loginAction()
    {
        if (isset($_SESSION["user"]) && $_SESSION["user"]) {
            header("Location: /");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            require("views/auth/login.php");
        } else {
            $userInput = [
                "username" => isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : null,
                "password" => isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : null
            ];
            $user = $this->userManager->getByUsername($userInput["username"]);
            if ($user && $user->password == $userInput["password"]) {
                $_SESSION["user"] = $user;
                header("Location: /");
                exit();
            } else {
                $errorMessage = "Wrong password";
                require("views/auth/login.php");
            }
        }
    }

    public function logoutAction()
    {
        unset($_SESSION["user"]);
        header("Location: /");
        exit();
    }
}