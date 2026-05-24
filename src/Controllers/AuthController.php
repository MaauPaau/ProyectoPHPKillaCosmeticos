<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Core\Validator;

class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->userModel = new User();
    }

    public function loginForm() {
        if (isset($_SESSION['user_id'])) {
            $this->redirect('/');
        }
        $this->render('auth/login', ['title' => 'Iniciar Sesión'], 'auth');
    }

    public function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->verifyLogin($email, $password);

        if ($user) {
            $_SESSION['user_id'] = $user['id_usuario'];
            $_SESSION['user_name'] = $user['nombre'];
            $_SESSION['user_role'] = $user['rol'];
            $this->redirect('/');
        } else {
            $this->render('auth/login', [
                'title' => 'Iniciar Sesión',
                'error' => 'Credenciales inválidas'
            ], 'auth');
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect('/login');
    }
}
