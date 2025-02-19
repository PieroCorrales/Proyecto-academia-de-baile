<?php
// Archivo: app/models/ReservationModel.php

// Incluir la configuración de la base de datos
require_once 'C:/xampp/htdocs/proyecto-clases-baile/config/config.php';

class ReservationModel {
    // Registrar una nueva reserva
    public function reservar($datos) {
        $sentencia = $GLOBALS['conexion']->prepare("INSERT INTO reservas (usuario_id, clase, fecha) VALUES (?, ?, ?)");
        return $sentencia->execute([$datos['usuario_id'], $datos['clase'], $datos['fecha']]);
    }

    // Obtener todas las reservas de un usuario
    public function obtenerReservasPorUsuario($usuario_id) {
        $sentencia = $GLOBALS['conexion']->prepare("SELECT * FROM reservas WHERE usuario_id = ?");
        $sentencia->execute([$usuario_id]);
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todas las reservas (para el administrador)
    public function obtenerTodasLasReservas() {
        $sentencia = $GLOBALS['conexion']->query("SELECT * FROM reservas");
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
}