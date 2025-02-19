<?php
// process_login.php

// Incluir el controlador de autenticación
require_once '../controllers/AuthController.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $datos = [
        'correo_electronico' => $_POST['correo_electronico'],
        'contraseña' => $_POST['contraseña']
    ];

    // Crear una instancia del controlador
    $authController = new AuthController();

    // Iniciar sesión
    $resultado = $authController->iniciarSesion($datos);

    // Redirigir o mostrar el resultado
    if ($resultado === "Inicio de sesión exitoso.") {
        // Redirigir al panel correspondiente según el rol
        session_start();
        if ($_SESSION['rol'] === 'administrador') {
            header('Location: /proyecto-clases-baile/app/views/admin/users.php');
        } else {
            header('Location: /proyecto-clases-baile/app/views/dashboard/profile.php');
        }
        exit;
    } else {
        echo "<script>alert('$resultado'); window.history.back();</script>";
    }
} else {
    echo "Acceso no permitido.";
}