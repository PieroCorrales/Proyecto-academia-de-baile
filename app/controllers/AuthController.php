<?php
// Archivo: app/controllers/AuthController.php

require_once '../models/UserModel.php';

class AuthController {
    private $modeloUsuario;

    public function __construct() {
        $this->modeloUsuario = new UserModel();
    }

    // Procesar el registro de un nuevo usuario
    public function registrar($datos) {
        if (empty($datos['nombre']) || empty($datos['apellidos']) || empty($datos['dni']) || empty($datos['email']) || empty($datos['contraseña']) || empty($datos['confirmar_contraseña'])) {
            return "Todos los campos son obligatorios.";
        }

        if ($datos['contraseña'] !== $datos['confirmar_contraseña']) {
            return "Las contraseñas no coinciden.";
        }

        if ($this->modeloUsuario->buscarPorEmail($datos['email'])) {
            return "El correo electrónico ya está registrado.";
        }

        if ($this->modeloUsuario->registrar($datos)) {
            return "Registro exitoso.";
        } else {
            return "Error al registrar.";
        }
    }

    // Procesar el inicio de sesión
    public function iniciarSesion($datos) {
        if (empty($datos['correo_electronico']) || empty($datos['contraseña'])) {
            return "Debes proporcionar un correo electrónico y una contraseña.";
        }

        $usuario = $this->modeloUsuario->buscarPorEmail($datos['correo_electronico']);

        if (!$usuario) {
            return "El correo electrónico no está registrado.";
        }

        if (!password_verify($datos['contraseña'], $usuario['contraseña'])) {
            return "La contraseña es incorrecta.";
        }

        // Iniciar sesión (puedes guardar el ID del usuario en una sesión)
        session_start();
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['rol'] = $usuario['rol'];

        return "Inicio de sesión exitoso.";
    }
}