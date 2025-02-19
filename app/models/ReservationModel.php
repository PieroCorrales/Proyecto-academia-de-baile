<?php
// Archivo: app/models/ReservationModel.php

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

    // Actualizar el estado de una reserva
    public function actualizarEstado($id, $estado) {
        $sentencia = $GLOBALS['conexion']->prepare("UPDATE reservas SET estado = ? WHERE id = ?");
        return $sentencia->execute([$estado, $id]);
    }

    public function verificarCapacidad($clase_id) {
        $sentencia = $GLOBALS['conexion']->prepare("SELECT COUNT(*) AS reservas FROM reservas WHERE clase_id = ?");
        $sentencia->execute([$clase_id]);
        $reservasActuales = $sentencia->fetch(PDO::FETCH_ASSOC)['reservas'];
    
        $sentencia = $GLOBALS['conexion']->prepare("SELECT capacidad FROM clases WHERE id = ?");
        $sentencia->execute([$clase_id]);
        $capacidadMaxima = $sentencia->fetch(PDO::FETCH_ASSOC)['capacidad'];
    
        return $reservasActuales < $capacidadMaxima;
    }
}