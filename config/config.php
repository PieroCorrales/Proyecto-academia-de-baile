<?php
// Archivo: config/config.php

$host = 'localhost'; // Servidor de la base de datos
$dbname = 'escuela_baile'; // Nombre de la base de datos (asegúrate de que esta base de datos existe)
$username = 'root'; // Usuario de la base de datos
$password = ''; // Contraseña del usuario (en este caso, está vacía)

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("No se pudo conectar a la base de datos: " . $e->getMessage());
}