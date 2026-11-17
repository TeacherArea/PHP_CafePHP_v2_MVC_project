<?php

session_start([
    'cookie_httponly' => true,
    'cookie_secure' => !empty($_SERVER['HTTPS'])
        && $_SERVER['HTTPS'] !== 'off',
    'cookie_samesite' => 'Lax'
]);

// Endast under utveckling.
ini_set('display_errors', '1');
error_reporting(E_ALL);

// Ladda controllers och View automatiskt.
spl_autoload_register(function ($className) {
    foreach (['Controllers', 'Views'] as $directory) {
        $file = __DIR__ . "/../app/{$directory}/{$className}.php";

        if (is_file($file)) {
            require_once $file;
            return;
        }
    }
});

// Tillåtna routes, uppdelade efter HTTP-metod.
$routes = [
    'GET' => [
        'home/show' => [HomeController::class, 'showStart'],
        'blog/show' => [BlogController::class, 'showBlog'],
        'shop/show' => [ShopController::class, 'showUser'],
    ],
    'POST' => [
        'user/register' => [UserController::class, 'registerNewUser'],
        'user/login' => [UserController::class, 'login'],
    ],
];

// Läs URL-parametrarna.
$page = $_GET['page'] ?? 'home';
$method = $_GET['method'] ?? 'show';

$httpMethod = $_SERVER['REQUEST_METHOD'];
$route = $page . '/' . $method;

/*
echo '<pre>';
var_dump([
    'httpMethod' => $httpMethod,
    'page' => $page,
    'method' => $method,
    'route' => $route
]);
echo '</pre>';
exit;
*/

// Kontroll av att routen är tillåten.
if (!isset($routes[$httpMethod][$route])) {
    http_response_code(404);

    $errorController = new ErrorController(new View());
    $errorController->show();
    exit;
}

// Hämta controller och metod från route-tabellen.
[$controllerClass, $controllerMethod] = $routes[$httpMethod][$route];

$view = new View();
$controller = new $controllerClass($view);

// Kör vald controller-metod.
$controller->$controllerMethod();