<header>
    <h1><?php echo $welcomeMessage; ?></h1>
    <nav>
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
    </nav>
</header>
