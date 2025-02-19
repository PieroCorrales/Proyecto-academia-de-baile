<?php
// cerrar_sesion.php

// Iniciar o recuperar la sesión actual
session_start();

// Destruir todas las variables de sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión
header('Location: /proyecto-clases-baile/app/views/auth/login.php');
exit;