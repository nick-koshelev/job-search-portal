<?php

require("models/User.php");

class HomeController
{
    public function indexAction()
    {
        // test start
        $userManager = new UserManager();
        print_r($userManager->getUsers());
        // test end

        require('views/home/home.php');
    }
}