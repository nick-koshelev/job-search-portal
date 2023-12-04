<?php

namespace controllers;

use DatabaseHelper;
use models\UserManager;

require_once("app/models/User.php");
require_once("app/controllers/BaseController.php");

class HomeController extends BaseController
{
    public function indexAction()
    {
        // test start
        //$userManager = new UserManager();
        //print_r($userManager->getUsers());
        // test end

//        // test start
//        $db = new DatabaseHelper();
//        $db->open();
//        $data = $db->getData("vacancies");
//        $db->close();
//        print_r($data);
//        // test end

//        print_r("<br><br>");
//
//        // test start
//        $db = new DatabaseHelper();
//        $db->open();
//        $data = $db->getData("user_vacancy");
//        $db->close();
//        print_r($data);
//        // test end

        $this->render("WorkVista - Such dein traum Job", "app/views/home/home.php");
    }
}