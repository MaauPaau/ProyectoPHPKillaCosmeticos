<?php
namespace App\Core;

class Router {
    protected $routes = [];

    public function add($method, $path, $callback) {
        $path = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[^/]+)', $path);
        $this->routes[] = [
            'method' => $method,
            'path' => "#^" . $path . "$#",
            'callback' => $callback
        ];
    }

    public function dispatch($method, $uri) {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/');
        if (empty($uri)) $uri = '/';

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && preg_match($route['path'], $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                return $this->callCallback($route['callback'], $params);
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }

    protected function callCallback($callback, $params) {
        if (is_array($callback)) {
            [$controller, $method] = $callback;
            $controllerInstance = new $controller();
            return call_user_func_array([$controllerInstance, $method], $params);
        }
        return call_user_func($callback, $params);
    }
}
