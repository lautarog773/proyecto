<?php
require_once '../config/db.php';
session_start(); // Inicia la sesión para verificar si el usuario está autenticado

// Mensaje de bienvenida
$welcomeMessage = "Bienvenido a la Plataforma de Gestión de Eventos";

// Verificar si el usuario está autenticado
$isAuthenticated = isset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Inicio</title>
</head>
<body>
    <?php include '../src/Views/header.php'; ?>

    <main>
        <section>
            <h1><?php echo $welcomeMessage; ?></h1>
            <p>En esta plataforma, puedes gestionar eventos, crear nuevos eventos, y mucho más.</p>
        </section>

        <section>
            <h2>Enlaces Rápidos</h2>
            <ul>
                <?php if ($isAuthenticated): ?>
                    <li><a href="dashboard.php">Panel de Usuario</a></li>
                    <li><a href="event.php">Crear Evento</a></li>
                    <li><a href="logout.php">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="login.php">Iniciar Sesión</a></li>
                    <li><a href="register.php">Registrarse</a></li>
                <?php endif; ?>
            </ul>
        </section>
    </main>

    <?php include '../src/Views/footer.php'; ?>
</body>
</html>
