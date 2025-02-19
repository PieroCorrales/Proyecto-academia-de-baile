<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
</head>
<body>
    <!-- Bienvenida al Administrador -->
    <h1>Bienvenido, Administrador</h1>
    <?php
    session_start();
    if (isset($_SESSION['usuario_id']) && $_SESSION['rol'] === 'administrador') {
        echo "<p>Tu ID de administrador es: " . $_SESSION['usuario_id'] . "</p>";
    } else {
        echo "<p>No tienes permiso para acceder a este panel.</p>";
        header('Refresh:2; url=/proyecto-clases-baile/app/views/auth/login.php');
        exit;
    }
    ?>

    <!-- Mostrar Lista de Reservas -->
    <h2>Lista de Reservas</h2>
    <?php
    // Incluir el controlador de reservas
    require_once 'C:/xampp/htdocs/proyecto-clases-baile/app/controllers/ReservationController.php';
    $reservationController = new ReservationController();
    $reservas = $reservationController->obtenerTodasLasReservas();

    if (count($reservas) > 0) {
        echo "<ul>";
        foreach ($reservas as $reserva) {
            echo "<li>Usuario ID: {$reserva['usuario_id']} - Clase: {$reserva['clase']} - Fecha: {$reserva['fecha']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No hay reservas registradas.</p>";
    }
    ?>

    <!-- Enlace para Cerrar Sesión -->
    <a href="/proyecto-clases-baile/app/routes/cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>