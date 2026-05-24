<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Router;

// Cargar variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

// Iniciar sesión
session_start();

// Enrutamiento
$router = new Router();

// Definir rutas
$router->add('GET', '/', 'ProductController@index');
$router->add('GET', '/login', 'AuthController@loginForm');
$router->add('POST', '/login', 'AuthController@login');
$router->add('POST', '/logout', 'AuthController@logout');
$router->add('GET', '/dashboard', 'DashboardController@index');

$router->add('GET', '/products', 'ProductController@index');
$router->add('GET', '/products/create', 'ProductController@create');
$router->add('POST', '/products/store', 'ProductController@store');
$router->add('GET', '/products/edit', 'ProductController@edit');
$router->add('POST', '/products/update', 'ProductController@update');
$router->add('POST', '/products/delete', 'ProductController@delete');

$router->add('GET', '/export/products/pdf', 'ProductController@exportPDF');
$router->add('GET', '/export/products/excel', 'ProductController@exportExcel');
$router->add('GET', '/export/products/csv', 'ProductController@exportCSV');

// Despachar la ruta
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
