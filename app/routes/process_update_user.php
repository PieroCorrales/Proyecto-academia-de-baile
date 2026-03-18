<?php
require_once __DIR__ . '/../models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'administrador') {
        die("No tienes permiso para realizar esta acción.");
    }

    $id    = $_POST['id'];
    $datos = [
        'nombre'    => $_POST['nombre'],
        'apellidos' => $_POST['apellidos'],
        'dni'       => $_POST['dni'],
        'email'     => $_POST['email']
    ];

    $userModel = new UserModel();

    if ($userModel->actualizarUsuario($id, $datos)) {
        echo "<script>
                alert('Datos actualizados correctamente.');
                window.location.href='" . BASE_URL . "/app/views/admin/users_data.php';
              </script>";
    } else {
        echo "<script>alert('Error al actualizar los datos.'); window.history.back();</script>";
    }
} else {
    echo "Acceso no permitido.";
}
