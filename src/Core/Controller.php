<?php
namespace App\Core;

abstract class Controller {
    protected function render($view, $data = []) {
        extract($data);
        $viewPath = __DIR__ . "/../Views/" . $view . ".php";

        if (file_exists($viewPath)) {
            // Generar token CSRF si no existe
            if (empty($_SESSION['csrf_token'])) {
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            }

            ob_start();
            require $viewPath;
            $content = ob_get_clean();

            $layoutPath = __DIR__ . "/../Views/layouts/main.php";
            if (file_exists($layoutPath)) {
                require $layoutPath;
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

    protected function validateCSRF() {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
            http_response_code(403);
            die("Error CSRF: Token inválido o ausente.");
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
