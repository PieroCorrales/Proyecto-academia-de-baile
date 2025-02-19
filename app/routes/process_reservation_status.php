<?php
// process_reservation_status.php

// Incluir el controlador de reservas
require_once '../controllers/ReservationController.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    // Verificar que el usuario sea administrador
    if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'administrador') {
        die("No tienes permiso para realizar esta acción.");
    }

    // Obtener los datos del formulario
    $id = $_POST['id'];
    $estado = $_POST['estado'];

    // Validar el estado
    if (!in_array($estado, ['aceptada', 'rechazada'])) {
        die("Estado inválido.");
    }

    // Crear una instancia del controlador
    $reservationController = new ReservationController();

    // Actualizar el estado de la reserva
    if ($reservationController->actualizarEstado($id, $estado)) {
        echo "<script>alert('Estado actualizado correctamente.'); window.location.href='/proyecto-clases-baile/app/views/admin/users.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar el estado.'); window.history.back();</script>";
    }
} else {
    echo "Acceso no permitido.";
}