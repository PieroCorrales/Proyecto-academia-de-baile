<?php
// ============================================================
//  CONFIGURACIÓN DE LA APLICACIÓN
//  Copia este fichero como config.php y ajusta los valores.
// ============================================================

// URL base del proyecto (sin barra final)
// Ejemplo: '/proyecto-clases-baile-copia' si está en localhost/proyecto-clases-baile-copia/
define('BASE_URL', '/proyecto-clases-baile-copia');

// Credenciales de base de datos
$host     = 'localhost';
$dbname   = 'escuela_baile';
$username = 'root';
$password = '';

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("No se pudo conectar a la base de datos: " . $e->getMessage());
}
