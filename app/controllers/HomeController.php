<?php

namespace controllers;

use models\UserManager;

require_once("app/models/User.php");
require_once("app/controllers/BaseController.php");

class HomeController extends BaseController
{
    public function indexAction()
    {
        // test start
        $userManager = new UserManager();
        print_r($userManager->getUsers());
        // test end

        $this->render("WorkVista - Such dein traum Job", "app/views/home/home.php");
    }
}