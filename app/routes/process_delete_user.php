<?php
require_once __DIR__ . '/../models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'administrador') {
        die("No tienes permiso para realizar esta acción.");
    }

    $id        = $_POST['id'];
    $userModel = new UserModel();

    if ($userModel->eliminarUsuario($id)) {
        echo "<script>
                alert('Usuario eliminado correctamente.');
                window.location.href='" . BASE_URL . "/app/views/admin/users_data.php';
              </script>";
    } else {
        echo "<script>alert('Error al eliminar el usuario.'); window.history.back();</script>";
    }
} else {
    echo "Acceso no permitido.";
}
