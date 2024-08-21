<?php
require_once '../config/db.php';
require_once '../src/Controllers/AuthController.php';

$authController = new AuthController($pdo);

session_start();
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php"); // Redirige al dashboard si el usuario ya está autenticado
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $authController->login($username, $password);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Inicio de Sesión</title>
</head>
<body>
    <?php include '../src/Views/login.view.php'; ?>
</body>
</html>