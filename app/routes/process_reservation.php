<?php
// process_reservation.php

// Incluir el controlador de reservas
require_once 'C:/xampp/htdocs/proyecto-clases-baile/app/controllers/ReservationController.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    // Obtener los datos del formulario
    $datos = [
        'usuario_id' => $_SESSION['usuario_id'], // ID del usuario actual
        'clase' => $_POST['clase'],
        'fecha' => $_POST['fecha']
    ];

    // Crear una instancia del controlador
    $reservationController = new ReservationController();

    // Crear la reserva
    $resultado = $reservationController->crearReserva($datos);

    // Redirigir o mostrar el resultado
    if ($resultado === "Reserva exitosa.") {
        echo "<script>alert('Reserva exitosa.'); window.location.href='/proyecto-clases-baile/app/views/dashboard/reservations.php';</script>";
    } else {
        echo "<script>alert('$resultado'); window.history.back();</script>";
    }
} else {
    echo "Acceso no permitido.";
}