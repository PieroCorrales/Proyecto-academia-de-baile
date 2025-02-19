<?php
// Archivo: app/controllers/ReservationController.php

require_once 'C:/xampp/htdocs/proyecto-clases-baile/app/models/ReservationModel.php';

class ReservationController
{
    private $modeloReserva;

    public function __construct()
    {
        $this->modeloReserva = new ReservationModel();
    }

    // Crear una nueva reserva
    public function crearReserva($datos)
    {
        if (empty($datos['clase']) || empty($datos['fecha'])) {
            return "Debes proporcionar una clase y una fecha.";
        }

        if ($this->modeloReserva->reservar($datos)) {
            return "Reserva exitosa.";
        } else {
            return "Error al realizar la reserva.";
        }
    }

    // Obtener las reservas de un usuario
    public function obtenerReservasPorUsuario($usuario_id)
    {
        return $this->modeloReserva->obtenerReservasPorUsuario($usuario_id);
    }

    // Obtener todas las reservas (para el administrador)
    public function obtenerTodasLasReservas()
    {
        return $this->modeloReserva->obtenerTodasLasReservas();
    }

    // Actualizar el estado de una reserva
    public function actualizarEstado($id, $estado)
    {
        return $this->modeloReserva->actualizarEstado($id, $estado);
    }

    // Validar si una fecha es válida para reservas
    public function esFechaValida($fecha)
    {
        // Convertir la fecha a un objeto DateTime
        $date = new DateTime($fecha);

        // Definir el rango válido (mes de marzo)
        $inicioMarzo = new DateTime('2023-03-01');
        $finMarzo = new DateTime('2023-03-31');

        // Verificar si la fecha está dentro del rango de marzo
        if ($date < $inicioMarzo || $date > $finMarzo) {
            return false;
        }

        // Verificar si el día es laborable (lunes a viernes)
        $diaSemana = (int)$date->format('N'); // 1 = lunes, ..., 7 = domingo
        if ($diaSemana > 5) { // Sábado (6) o Domingo (7)
            return false;
        }

        return true;
    }

    // Obtener clases disponibles para un día específico
public function obtenerClasesPorDia($dia) {
    $sentencia = $GLOBALS['conexion']->prepare("
        SELECT c.nombre AS clase_nombre, h.hora_inicio, h.hora_fin
        FROM horarios_clases h
        JOIN clases c ON h.clase_id = c.id
        WHERE h.dia = ?
        ORDER BY h.hora_inicio
    ");
    $sentencia->execute([$dia]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
}
}
