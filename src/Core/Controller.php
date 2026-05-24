<?php
namespace App\Core;

abstract class Controller {
    protected function render($view, $data = []) {
        extract($data);
        $viewPath = __DIR__ . "/../Views/" . $view . ".php";

        if (file_exists($viewPath)) {
            // Soporte para layout
            ob_start();
            require_once $viewPath;
            $content = ob_get_clean();

            $layoutPath = __DIR__ . "/../Views/layouts/main.php";
            if (file_exists($layoutPath)) {
                require_once $layoutPath;
            } else {
                echo $content;
            }
        } else {
            error_log("Vista $view no encontrada en $viewPath");
            http_response_code(500);
            echo "Error interno del servidor.";
            exit;
        }
    }

    protected function redirect($url) {
        header("Location: $url");
        exit;
    }

    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function checkAuth() {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/login');
        }
    }

    protected function checkRole($roles) {
        $this->checkAuth();
        if (is_array($roles)) {
            if (!in_array($_SESSION['user_role'], $roles)) {
                http_response_code(403);
                echo "Acceso denegado: No tiene permisos para esta acción.";
                exit;
            }
        } else {
            if ($_SESSION['user_role'] !== $roles) {
                http_response_code(403);
                echo "Acceso denegado: No tiene permisos para esta acción.";
                exit;
            }
        }
    }
}
