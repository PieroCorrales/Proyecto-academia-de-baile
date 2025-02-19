<?php
// Archivo: app/models/UserModel.php

// Incluir la configuración de la base de datos
require_once '../../config/config.php';

class UserModel {
    // Registrar un nuevo usuario
    public function registrar($datos) {
        $sentencia = $GLOBALS['conexion']->prepare("INSERT INTO usuarios (nombre, apellidos, dni, email, contraseña) VALUES (?, ?, ?, ?, ?)");
        $contraseña_segura = password_hash($datos['contraseña'], PASSWORD_DEFAULT);
        return $sentencia->execute([$datos['nombre'], $datos['apellidos'], $datos['dni'], $datos['email'], $contraseña_segura]);
    }

    // Buscar un usuario por email
    public function buscarPorEmail($email) {
        $sentencia = $GLOBALS['conexion']->prepare("SELECT * FROM usuarios WHERE email = ?");
        $sentencia->execute([$email]);
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    }
}