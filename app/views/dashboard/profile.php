<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Usuario</title>
</head>
<body>
    <h1>Bienvenido, Usuario</h1>
    <?php
    session_start();
    if (isset($_SESSION['usuario_id'])) {
        echo "<p>Tu ID de usuario es: " . $_SESSION['usuario_id'] . "</p>";
    } else {
        echo "<p>No has iniciado sesión.</p>";
        header('Refresh:2; url=/proyecto-clases-baile/app/views/auth/login.php');
        exit;
    }
    ?>
<a href="/proyecto-clases-baile/app/routes/cerrar_sesion.php">Cerrar Sesión</a></body>
</html>