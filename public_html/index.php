<?php
session_start();

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
$controllerClassName = ucfirst(strtolower($page)) . 'Controller';

// Kontrollerar om den önskade kontrollerklassen existerar
if (class_exists($controllerClassName)) {
    $controller = new $controllerClassName(new View());

    // Hantera inloggning om det är en POST-förfrågan för inloggning
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['log-in'])) {
        $controller->login();
    } else if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        $controller = new ErrorController(new View());
        $controller->index(); // Eller en annan metod som visar 404-sidan
    }
} else {
    $controller = new ErrorController(new View());
    $controller->index(); // Eller en annan metod som visar 404-sidan
}
