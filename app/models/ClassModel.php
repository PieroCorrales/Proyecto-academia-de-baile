<?php
// Archivo: app/models/ClassModel.php

require_once 'C:/xampp/htdocs/proyecto-clases-baile/config/config.php';

class ClassModel {
    // Obtener todas las clases
    public function obtenerTodasLasClases() {
        $sentencia = $GLOBALS['conexion']->query("SELECT * FROM clases");
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener clases por día
    public function obtenerClasesPorDia($dia) {
        $sentencia = $GLOBALS['conexion']->prepare("SELECT * FROM clases WHERE dia = ? ORDER BY hora_inicio ASC");
        $sentencia->execute([$dia]);
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear una nueva clase
    public function crearClase($datos) {
        $sentencia = $GLOBALS['conexion']->prepare("INSERT INTO clases (nombre, descripcion, dia, hora_inicio, hora_fin, capacidad) VALUES (?, ?, ?, ?, ?, ?)");
        return $sentencia->execute([
            $datos['nombre'],
            $datos['descripcion'],
            $datos['dia'],
            $datos['hora_inicio'],
            $datos['hora_fin'],
            $datos['capacidad']
        ]);
    }

    // Actualizar una clase existente
    public function actualizarClase($id, $datos) {
        $sentencia = $GLOBALS['conexion']->prepare("UPDATE clases SET nombre = ?, descripcion = ?, dia = ?, hora_inicio = ?, hora_fin = ?, capacidad = ? WHERE id = ?");
        return $sentencia->execute([
            $datos['nombre'],
            $datos['descripcion'],
            $datos['dia'],
            $datos['hora_inicio'],
            $datos['hora_fin'],
            $datos['capacidad'],
            $id
        ]);
    }

    // Eliminar una clase
    public function eliminarClase($id) {
        $sentencia = $GLOBALS['conexion']->prepare("DELETE FROM clases WHERE id = ?");
        return $sentencia->execute([$id]);
    }
}