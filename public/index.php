<?php
require_once __DIR__ . '/../src/autoload.php';

use App\Core\Router;
use App\Controllers\ProductController;
use App\Controllers\AuthController;

$router = new Router();

// Define routes
$router->add('GET', '/', function() {
    if (session_status() === PHP_SESSION_NONE) session_start();
    $name = $_SESSION['user_name'] ?? 'Invitado';
    echo "<h1>Bienvenido a Killa Cosméticos Professional, $name</h1>";
    echo "<p><a href='/products'>Ver Productos</a></p>";
    if (isset($_SESSION['user_id'])) {
        echo "<p><a href='/logout'>Cerrar Sesión</a></p>";
    } else {
        echo "<p><a href='/login'>Iniciar Sesión</a></p>";
    }
});

$router->add('GET', '/login', [AuthController::class, 'loginForm']);
$router->add('POST', '/login', [AuthController::class, 'login']);
$router->add('GET', '/logout', [AuthController::class, 'logout']);

$router->add('GET', '/products', [ProductController::class, 'index']);
$router->add('GET', '/products/create', [ProductController::class, 'create']);
$router->add('POST', '/products/store', [ProductController::class, 'store']);
$router->add('GET', '/products/edit/{id}', [ProductController::class, 'edit']);

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$scriptName = dirname($_SERVER['SCRIPT_NAME']);
if ($scriptName !== '/' && $scriptName !== '\\') {
    $uri = str_replace($scriptName, '', $uri);
}

$router->dispatch($method, $uri);
