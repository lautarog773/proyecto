<?php
require_once __DIR__ . '/../Models/User.php';

class AuthController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function register($username, $password) {
        // Verifica si el usuario ya existe
        if ($this->userModel->userExists($username)) {
            return false;
        }

        // Encripta la contraseña y registra el usuario
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $this->userModel->register($username, $hashedPassword);
    }

    public function login($username, $password) {
        $user = $this->userModel->login($username, $password);
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
        } else {
            echo "Nombre de usuario o contraseña incorrectos";
        }
    }
}
?>
