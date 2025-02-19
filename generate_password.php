<?php
// generate_password.php

$plainPassword = 'Admin123'; // Contraseña en texto plano
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

echo "Contraseña hash generada: $hashedPassword";
?>