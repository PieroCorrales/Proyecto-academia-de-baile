<?php
require_once __DIR__ . '/../controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'correo_electronico' => $_POST['correo_electronico'],
        'contraseña'         => $_POST['contraseña']
    ];

    $authController = new AuthController();
    $resultado = $authController->iniciarSesion($datos);

    if ($resultado === "Sesion iniciada.") {
        if ($_SESSION['rol'] === 'administrador') {
            header('Location: ' . BASE_URL . '/app/views/admin/users.php');
        } else {
            header('Location: ' . BASE_URL . '/app/views/dashboard/profile.php');
        }
        exit;
    } else {
        $msg = json_encode($resultado);
        echo "<script>alert($msg); window.history.back();</script>";
    }
} else {
    echo "Acceso no permitido.";
}
