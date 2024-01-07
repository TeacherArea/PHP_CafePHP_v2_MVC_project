<?php

// spl_autoload_register() letar efter ett klassnamn, först i Controllers 
// och om det inte finns där så letas det vidare efter det i Views
spl_autoload_register(function ($class_name) {
    $file = __DIR__ . '/../app/Controllers/' . $class_name . '.php';
    if (!file_exists($file)) {
        $file = __DIR__ . '/../app/Views/' . $class_name . '.php';
    }
    
    if (file_exists($file)) {
        require_once $file;
    }
});

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$method = isset($_GET['method']) ? $_GET['method'] : 'index';

// Skapar klassnamnet baserat på 'page' parametern
$controllerClassName = ucfirst(strtolower($page)) . 'Controller';
$controller = null;

// Kontrollerar om den önskade kontrollerklassen existerar
if (class_exists($controllerClassName)) {
    $controller = new $controllerClassName(new View());
} else {
    $controller = new ErrorController(new View());
    $method = 'index'; // Eller en metod som visar en 404-sida
}

if (method_exists($controller, $method)) {
    $controller->$method();
} else {
    $controller = new ErrorController(new View());
    $controller->index();
}

// Fortsätt med resten av bootstrap och routing...
