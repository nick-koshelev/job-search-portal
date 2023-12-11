<?php

namespace controllers;

class BaseController
{
    protected function render($pageTitle, $viewPath, $viewData = [], $showHeader = true, $showFooter = true) {
        extract($viewData);
        include "app/views/layout.php";
    }
}