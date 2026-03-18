<?php
require_once __DIR__ . '/../controllers/ReservationController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $datos = [
        'usuario_id' => $_SESSION['usuario_id'],
        'clase'      => $_POST['clase'],
        'fecha'      => $_POST['fecha']
    ];

    $reservationController = new ReservationController();
    $resultado = $reservationController->crearReserva($datos);

    if ($resultado === "Reserva exitosa.") {
        echo "<script>
                alert('Reserva realizada correctamente.');
                window.location.href='" . BASE_URL . "/app/views/dashboard/reservations_list.php';
              </script>";
    } else {
        $msg = json_encode($resultado);
        echo "<script>alert($msg); window.history.back();</script>";
    }
} else {
    echo "Acceso no permitido.";
}
