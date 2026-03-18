<?php

require_once __DIR__ . '/../models/ReservationModel.php';

class ReservationController
{
    private $modeloReserva;

    public function __construct()
    {
        $this->modeloReserva = new ReservationModel();
    }

    //todo crea una nueva reserva
    public function crearReserva($datos)
    {
        if (empty($datos['clase']) || empty($datos['fecha'])) {
            return "Debes proporcionar una clase y una fecha.";
        }

        //todo verifica si la fecha es válida
        if (!$this->esFechaValida($datos['fecha'])) {
            return "La fecha seleccionada no es válida.";
        }

        //todo verifica si hay espacio disponible en la clase
        if (!$this->modeloReserva->tieneEspacioDisponible($datos['clase'], $datos['fecha'])) {
            return "Lo sentimos, esta clase ya ha alcanzado su capacidad máxima.";
        }

        //todo registra la reserva
        if ($this->modeloReserva->reservar($datos)) {
            return "Reserva exitosa.";
        } else {
            return "Error al realizar la reserva.";
        }
    }

    //todo obtener reservas por id
    public function obtenerReservasPorUsuario($usuario_id)
    {
        return $this->modeloReserva->obtenerReservasPorUsuario($usuario_id);
    }

    //todo ADMIN Obtener todas las reservas
    public function obtenerTodasLasReservas()
    {
        return $this->modeloReserva->obtenerTodasLasReservas();
    }

    //todo Actualiza el estado de una reserva
    public function actualizarEstado($id, $estado)
    {
        return $this->modeloReserva->actualizarEstado($id, $estado);
    }

    //todo Validar si una fecha es válida para reservas (día laborable, hoy o futuro, máx 3 meses)
    public function esFechaValida($fecha)
    {
        $date = new DateTime($fecha);
        $hoy = new DateTime('today');
        $limiteMax = new DateTime('+3 months');

        if ($date < $hoy || $date > $limiteMax) {
            return false;
        }

        $diaSemana = (int)$date->format('N');
        if ($diaSemana > 5) {
            return false;
        }

        return true;
    }
    //todo Obtener clases por dia
    public function obtenerClasesPorDia($dia)
    {
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
    //todo Verificar si hay espacio en la clase
    public function tieneEspacioDisponible($clase, $fecha)
    {
        return $this->modeloReserva->tieneEspacioDisponible($clase, $fecha);
    }

}
