<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Reservas</title>
</head>
<body>
    <h1>Mis Reservas</h1>

    <!-- Formulario para Crear una Nueva Reserva -->
    <h2>Nueva Reserva</h2>
    <form action="../../routes/process_reservation.php" method="POST">
        <label for="clase">Clase:</label>
        <select name="clase" id="clase" required>
            <option value="latinos">Bailes Latinos</option>
            <option value="tango">Tango</option>
            <option value="hip_hop">Hip Hop</option>
            <option value="salsa">Salsa</option>
            <option value="yoga">Yoga</option>
        </select><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required min="<?php echo date('Y-m-d'); ?>">
        <button type="submit">Reservar</button>
    </form>

    <!-- Mostrar Reservas Existentes -->
    <h2>Tus Reservas Actuales</h2>
    <?php
    session_start();
    if (isset($_SESSION['usuario_id'])) {
        require_once 'C:/xampp/htdocs/proyecto-clases-baile/app/controllers/ReservationController.php';
        $reservationController = new ReservationController();
        $reservas = $reservationController->obtenerReservasPorUsuario($_SESSION['usuario_id']);

        if (count($reservas) > 0) {
            echo "<ul>";
            foreach ($reservas as $reserva) {
                echo "<li>Clase: {$reserva['clase']} - Fecha: {$reserva['fecha']}</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No tienes reservas realizadas.</p>";
        }
    } else {
        echo "<p>No has iniciado sesión.</p>";
    }
    ?>

    <!-- Enlace para Cerrar Sesión -->
    <a href="/proyecto-clases-baile/app/routes/cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>