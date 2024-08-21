<?php
require_once '../config/db.php';
require_once '../src/Controllers/AuthController.php';

// Crear una instancia del controlador de autenticación
$authController = new AuthController($pdo);

// Procesar el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if (empty($username) || empty($password) || empty($confirmPassword)) {
        $message = "Por favor complete todos los campos.";
    } elseif ($password !== $confirmPassword) {
        $message = "Las contraseñas no coinciden.";
    } else {
        if ($authController->register($username, $password)) {
            $message = "Registro exitoso. Puede iniciar sesión.";
            header("Location: login.php");
            exit();
        } else {
            $message = "Error al registrar el usuario.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Registro</title>
</head>
<body>
    <?php include '../src/Views/register.view.php'; ?>
    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</body>
</html>
