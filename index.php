<?php
// index.php

session_start(); // Démarre la session pour l'authentification

require_once __DIR__ . '/config/routes.php';
require_once __DIR__ . '/config/db.php';

// Détermine la route basée sur la méthode HTTP et le paramètre 'route'
$baseRoute = $_GET['route'] ?? 'home';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$route = $baseRoute;

// Si la méthode est POST, on utilise une route spécifique pour le traitement
if ($httpMethod === 'POST') {
    $route = "post_" . $baseRoute;
}

if (isset($routes[$route])) {
    [$controllerName, $method] = $routes[$route];
    
    // Chargement automatique des modèles et contrôleurs
    // (Une solution plus propre serait un autoloader, mais on garde la simplicité)
    require_once __DIR__ . "/controllers/$controllerName.php";

    // Chargement des modèles nécessaires pour l'injection dans le contrôleur (même si pas utilisé dans le constructeur)
    // Pour cet exemple, on injecte seulement la DB dans le constructeur du contrôleur

    $controller = new $controllerName($db);
    $controller->$method();
} else {
    // Si la route POST n'existe pas, on revient à la route GET
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