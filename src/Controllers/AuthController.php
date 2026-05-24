<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Core\Validator;

class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function loginForm() {
        if (isset($_SESSION['user_id'])) {
            $this->redirect('/dashboard');
        }
        $this->render('auth/login', ['title' => 'Iniciar Sesión']);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = Validator::clean($_POST['email']);
            $password = $_POST['password'];

            $user = $this->userModel->verifyLogin($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id_usuario'];
                $_SESSION['user_name'] = $user['nombre'];
                $_SESSION['user_role'] = $user['rol'];
                $_SESSION['user_email'] = $user['email'];

                $this->redirect('/dashboard');
            } else {
                $this->render('auth/login', [
                    'title' => 'Iniciar Sesión',
                    'error' => 'Credenciales inválidas'
                ]);
            }
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect('/login');
    }
}
