<?php

require_once 'database/Database.php';

$db = new Database();
$db->init();

session_start();
route();



function route()
{
    try {
        $request_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $request_url = trim($request_url, '/');
        $segments = explode('/', $request_url);

        $controllerName = getControllerName($segments[0] ?? "");
        $controllerFile = 'app/controllers/' . $controllerName . '.php';
        if (file_exists($controllerFile)) {
            require $controllerFile;
            $controller = new ("controllers\\" . $controllerName)();

            $actionName = getActionName($segments[1] ?? "");
            if (method_exists($controller, $actionName)) {
                $queryString = $_SERVER['QUERY_STRING'] ?? "";
                parse_str($queryString, $params);
                call_user_func_array([$controller, $actionName], $params);
            } else {
                http_response_code(404);
                require __DIR__ . '/app/views/404.php';
            }
        } else {
            http_response_code(404);
            require __DIR__ . '/app/views/404.php';
        }
    } catch (ArgumentCountError  $e) {
        http_response_code(404);
        require __DIR__ . '/app/views/404.php';
    }
}

function getControllerName($url): string
{
    if (empty($url) || $url === '/') {
        return 'HomeController';
    }
    return ucfirst(trim($url, '/')) . 'Controller';
}

function getActionName($url): string
{
    if (empty($url) || $url === '/') {
        return 'indexAction';
    }
    return ucfirst(trim($url, '/')) . 'Action';
}
