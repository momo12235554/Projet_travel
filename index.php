<?php
session_start();

require_once __DIR__ . '/config/routes.php';
require_once __DIR__ . '/config/db.php';
$baseRoute = $_GET['route'] ?? 'home';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$route = $baseRoute;
if ($httpMethod === 'POST') {
    $route = "post_" . $baseRoute;
}

if (isset($routes[$route])) {
    [$controllerName, $method] = $routes[$route];
    
    require_once __DIR__ . "/controllers/$controllerName.php";

    $controller = new $controllerName($db);
    $controller->$method();
} else {
    if (strpos($route, 'post_') === 0) {
        $route = $baseRoute;
        if (isset($routes[$route])) {
             [$controllerName, $method] = $routes[$route];
             require_once __DIR__ . "/controllers/$controllerName.php";
             $controller = new $controllerName($db);
             $controller->$method();
             exit;
        }
    }
    header("HTTP/1.0 404 Not Found");
    require __DIR__ . '/views/404.php';
}