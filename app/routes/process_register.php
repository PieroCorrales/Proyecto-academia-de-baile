<?php
require_once __DIR__ . '/../controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'nombre'              => $_POST['nombre'],
        'apellidos'           => $_POST['apellidos'],
        'dni'                 => $_POST['dni'],
        'email'               => $_POST['correo_electronico'],
        'contraseña'          => $_POST['contraseña'],
        'confirmar_contraseña' => $_POST['confirmar_contraseña']
    ];

    $authController = new AuthController();
    $resultado = $authController->registrar($datos);

    if (trim($resultado) === "Registrado correctamente.") {
        echo "<script>
                alert('Registro exitoso. Ahora puedes iniciar sesión.');
                window.location.href='" . BASE_URL . "/app/views/auth/login.php';
              </script>";
    } else {
        $msg = json_encode($resultado);
        echo "<script>alert($msg); window.history.back();</script>";
    }
} else {
    echo "Acceso no permitido.";
}
