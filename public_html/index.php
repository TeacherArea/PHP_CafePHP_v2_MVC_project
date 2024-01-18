<?php

session_start([
    'cookie_httponly' => true,
    //'cookie_secure' => true // Endast vid HTTPS
]);

// För att låta användaren se sitt användarnamn vid inloggning i en minut innan det tas bort ...
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user-mail'] = $_POST['user-mail'];
    $_SESSION['user-mail-time'] = time();
}

// ... och när formuläret visas i login-form.php kontrolleras om 60 sekunder gått
$storedUsername = '';
if (isset($_SESSION['user-mail']) && time() - $_SESSION['user-mail-time'] < 60) {
    $storedUsername = $_SESSION['user-mail'];
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($class_name) {
    $file = __DIR__ . '/../app/Controllers/' . $class_name . '.php';
    if (!file_exists($file)) {
        $file = __DIR__ . '/../app/Views/' . $class_name . '.php';
    }
    if (file_exists($file)) {
        require_once $file;
    }
});

$view = new View();
$page = isset($_GET['page']) ? $_GET['page'] : 'show';
$method = isset($_GET['method']) ? $_GET['method'] : 'show';
$controllerClassName = ucfirst(strtolower($page)) . 'Controller';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $controller = new $controllerClassName($view);

    if ($_POST['action'] === 'register') {
        $controller->registerNewUser();
    } elseif ($_POST['action'] === 'login') {
        $controller->login();
    }
} elseif (class_exists($controllerClassName)) {
    $controller = new $controllerClassName($view);
    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        header("HTTP/1.0 404 Not Found");
        $errorController = new ErrorController($view);
        $errorController->show();
    }
} else {
    header("HTTP/1.0 404 Not Found");
    $errorController = new ErrorController($view);
    $errorController->show();
}
