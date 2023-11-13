<?php

require_once 'database/Database.php';

$db = new Database();
$db->init();

session_start();

$request_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_url = trim($request_url, '/');
$segments = explode('/', $request_url);

$controllerName = getControllerName(isset($segments[0]) ? $segments[0] : "");
$controllerFile = 'controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require $controllerFile;
    $controller = new $controllerName();

    $actionName = getActionName(isset($segments[1]) ? $segments[1] : "");
    if (method_exists($controller, $actionName)) {
        $controller->$actionName();
    } else {
        http_response_code(404);
        require __DIR__ . '/views/404.php';
    }
} else {
    http_response_code(404);
    require __DIR__ . '/views/404.php';
}

function getControllerName($url)
{
    if (empty($url) || $url === '/') {
        return 'HomeController';
    }
    return ucfirst(trim($url, '/')) . 'Controller';
}

function getActionName($url)
{
    if (empty($url) || $url === '/') {
        return 'indexAction';
    }
    return ucfirst(trim($url, '/')) . 'Action';
}
