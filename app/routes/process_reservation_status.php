<?php
require_once __DIR__ . '/../controllers/ReservationController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'administrador') {
        die("No tienes permiso para realizar esta acción.");
    }

    $id     = $_POST['id'];
    $estado = $_POST['estado'];

    if (!in_array($estado, ['aceptada', 'rechazada'])) {
        die("Estado inválido.");
    }

    $reservationController = new ReservationController();

    if ($reservationController->actualizarEstado($id, $estado)) {
        echo "<script>
                alert('Estado actualizado correctamente.');
                window.location.href='" . BASE_URL . "/app/views/admin/reservations.php';
              </script>";
    } else {
        echo "<script>alert('Error al actualizar el estado.'); window.history.back();</script>";
    }
} else {
    echo "Acceso no permitido.";
}
