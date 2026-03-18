<?php
require_once __DIR__ . '/../../config/config.php';

class ClassModel {
    //todo Obtener todas las clases
    public function obtenerTodasLasClases() 
    {
        $sentencia = $GLOBALS['conexion']->query("SELECT * FROM clases");
        return ($sentencia->fetchAll(PDO::FETCH_ASSOC));
    }

    //todo Obtener clases por día
    public function obtenerClasesPorDia($dia) 
    {
        $sentencia = $GLOBALS['conexion']->prepare("SELECT * FROM clases WHERE dia = ? ORDER BY hora_inicio ASC");
        $sentencia->execute([$dia]);
        return ($sentencia->fetchAll(PDO::FETCH_ASSOC));
    }

}