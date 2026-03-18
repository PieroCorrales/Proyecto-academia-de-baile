<?php
require_once __DIR__ . '/../../config/config.php';

class ReservationModel {
    //todo Registra una nueva reserva
    public function reservar($datos) 
    {
        $sentencia = $GLOBALS['conexion']->prepare("INSERT INTO reservas (usuario_id, clase, fecha) 
                                                    VALUES (?, ?, ?)");
        return ($sentencia->execute([$datos['usuario_id'], $datos['clase'], $datos['fecha']]));
    }

    //todo Obtener todas las reservas de un usuario
    public function obtenerReservasPorUsuario($usuario_id) 
    {
        $sentencia = $GLOBALS['conexion']->prepare("SELECT * FROM reservas WHERE usuario_id = ?");
        $sentencia->execute([$usuario_id]);
        return ($sentencia->fetchAll(PDO::FETCH_ASSOC));
    }

    //todo Obtener todas las reservas (para el administrador)
    public function obtenerTodasLasReservas() 
    {
        $sentencia = $GLOBALS['conexion']->query("SELECT * FROM reservas");
        return ($sentencia->fetchAll(PDO::FETCH_ASSOC));
    }

    //todo Actualiza el estado de una reserva
    public function actualizarEstado($id, $estado) {
        $sentencia = $GLOBALS['conexion']->prepare("UPDATE reservas SET estado = ? WHERE id = ?");
        return ($sentencia->execute([$estado, $id]));
    }

    //todo Verifica si una clase tiene espacio disponible en una fecha específica
    public function tieneEspacioDisponible($clase, $fecha) {

        $capacidadMaxima = $this->obtenerCapacidadClase($clase);

        if (!$capacidadMaxima) {
            return false;
        }

        //* Contar nº reservas existen para esta clase y fecha
        $sentencia = $GLOBALS['conexion']->prepare("SELECT COUNT(*) AS total_reservas FROM reservas WHERE clase = ? AND fecha = ? AND estado = 'aceptada'");
        $sentencia->execute([$clase, $fecha]);
        $totalReservas = $sentencia->fetch(PDO::FETCH_ASSOC)['total_reservas'];

        return ($totalReservas < $capacidadMaxima);
    }

    //todo Obtener la capacidad máxima de una clase
    private function obtenerCapacidadClase($clase) 
    {
        $sentencia = $GLOBALS['conexion']->prepare("SELECT capacidad_maxima FROM capacidades_clases WHERE nombre_clase = ?");
        $sentencia->execute([$clase]);
        $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

        return ($resultado ? $resultado['capacidad_maxima'] : 0);
    }
}