<?php
// test_connection.php

require_once 'config/config.php';

if (isset($conexion)) {
    echo "Conexión exitosa a la base de datos.";
} else {
    echo "Error al conectar a la base de datos.";
}