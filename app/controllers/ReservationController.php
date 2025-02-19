<?php

require_once 'C:/xampp/htdocs/proyecto-clases-baile/app/models/ReservationModel.php';

class ReservationController {
    private $modeloReserva;

    public function __construct() {
        $this->modeloReserva = new ReservationModel();
    }
    //todo Procesar una nueva reserva
    public function crearReserva($datos) {
        if (empty($datos['clase']) || empty($datos['fecha'])) {
            return "Debes proporcionar una clase y una fecha.";
        }

        if ($this->modeloReserva->reservar($datos)) {
            return "Reserva exitosa.";
        } else {
            return "Error al realizar la reserva.";
        }
    }
    //todo Obtener las reservas de un usuario
    public function obtenerReservasPorUsuario($usuario_id) {
        return $this->modeloReserva->obtenerReservasPorUsuario($usuario_id);
    }
    //todo Obtener todas las reservas (para el administrador)
    public function obtenerTodasLasReservas() {
        return $this->modeloReserva->obtenerTodasLasReservas();
    }
}