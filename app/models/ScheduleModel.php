<?php
// Archivo: app/models/ScheduleModel.php

require_once 'C:/xampp/htdocs/proyecto-clases-baile/config/config.php';

class ScheduleModel {
    // Crear un nuevo horario
    public function crearHorario($datos) {
        $sentencia = $GLOBALS['conexion']->prepare("INSERT INTO horarios (clase_id, fecha, hora_inicio, hora_fin) VALUES (?, ?, ?, ?)");
        return $sentencia->execute([$datos['clase_id'], $datos['fecha'], $datos['hora_inicio'], $datos['hora_fin']]);
    }

    // Obtener todos los horarios
    public function obtenerTodosLosHorarios() {
        $sentencia = $GLOBALS['conexion']->query("SELECT h.id, c.nombre AS clase, h.fecha, h.hora_inicio, h.hora_fin FROM horarios h JOIN clases c ON h.clase_id = c.id");
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    // Editar un horario
    public function editarHorario($id, $datos) {
        $sentencia = $GLOBALS['conexion']->prepare("UPDATE horarios SET clase_id = ?, fecha = ?, hora_inicio = ?, hora_fin = ? WHERE id = ?");
        return $sentencia->execute([$datos['clase_id'], $datos['fecha'], $datos['hora_inicio'], $datos['hora_fin'], $id]);
    }

    // Eliminar un horario
    public function eliminarHorario($id) {
        $sentencia = $GLOBALS['conexion']->prepare("DELETE FROM horarios WHERE id = ?");
        return $sentencia->execute([$id]);
    }
}