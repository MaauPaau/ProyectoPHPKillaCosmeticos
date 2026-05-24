<?php
namespace App\Core;

class Router {
    protected $routes = [];

    public function add($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function dispatch($method, $uri) {
        $path = parse_url($uri, PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                try {
                    $this->executeHandler($route['handler']);
                } catch (\Exception $e) {
                    error_log("Router Error: " . $e->getMessage());
                    http_response_code(500);
                    echo "500 Internal Server Error";
                }
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }

    protected function executeHandler($handler) {
        list($controllerName, $method) = explode('@', $handler);
        $controllerClass = "App\\Controllers\\" . $controllerName;

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $method)) {
                $controller->$method();
            } else {
                throw new \Exception("Method $method not found in $controllerClass");
            }
        } else {
            throw new \Exception("Controller $controllerClass not found");
        }
    }
}
