<?php
// process_register.php

// Incluir el controlador de autenticación
require_once '../controllers/AuthController.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $datos = [
        'nombre' => $_POST['nombre'],
        'apellidos' => $_POST['apellidos'],
        'dni' => $_POST['dni'], // Nuevo campo DNI
        'email' => $_POST['correo_electronico'],
        'contraseña' => $_POST['contraseña'],
        'confirmar_contraseña' => $_POST['confirmar_contraseña']
    ];

    // Crear una instancia del controlador
    $authController = new AuthController();

    // Registrar al usuario
    $resultado = $authController->registrar($datos);

    // Redirigir o mostrar el resultado
    if ($resultado === "Registro exitoso.") {
        echo "<script>alert('Registro exitoso. Ahora puedes iniciar sesión.'); window.location.href='/proyecto-clases-baile/app/views/auth/login.php';</script>";
    } else {
        echo "<script>alert('$resultado'); window.history.back();</script>";
    }
} else {
    echo "Acceso no permitido.";
}