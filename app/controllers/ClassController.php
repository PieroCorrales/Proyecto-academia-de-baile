<?php
// Archivo: app/controllers/ClassController.php

require_once 'C:/xampp/htdocs/proyecto-clases-baile/app/models/ClassModel.php';

class ClassController {
    private $modeloClase;

    public function __construct() {
        $this->modeloClase = new ClassModel();
    }

    // Obtener todas las clases
    public function obtenerTodasLasClases() {
        return $this->modeloClase->obtenerTodasLasClases();
    }

    // Obtener clases por día
    public function obtenerClasesPorDia($dia) {
        return $this->modeloClase->obtenerClasesPorDia($dia);
    }

    // Crear una nueva clase
    public function crearClase($datos) {
        if (empty($datos['nombre']) || empty($datos['dia']) || empty($datos['hora_inicio']) || empty($datos['hora_fin'])) {
            return "Debes proporcionar todos los datos de la clase.";
        }

        if ($this->modeloClase->crearClase($datos)) {
            return "Clase creada exitosamente.";
        } else {
            return "Error al crear la clase.";
        }
    }

    // Actualizar una clase existente
    public function actualizarClase($id, $datos) {
        if ($this->modeloClase->actualizarClase($id, $datos)) {
            return "Clase actualizada exitosamente.";
        } else {
            return "Error al actualizar la clase.";
        }
    }

    // Eliminar una clase
    public function eliminarClase($id) {
        if ($this->modeloClase->eliminarClase($id)) {
            return "Clase eliminada exitosamente.";
        } else {
            return "Error al eliminar la clase.";
        }
    }
}