<?php

namespace controllers;

class BaseController
{
    protected function render($pageTitle, $viewPath, $viewData = []) {
        extract($viewData);
        include "app/views/layout.php";
    }
}