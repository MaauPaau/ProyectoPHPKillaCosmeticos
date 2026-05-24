<?php
namespace App\Core;

abstract class Controller {
    protected function render($view, $data = []) {
        extract($data);
        $viewPath = __DIR__ . "/../Views/" . $view . ".php";
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die("Vista $view no encontrada.");
        }
    }

    protected function redirect($url) {
        header("Location: $url");
        exit;
    }
}
