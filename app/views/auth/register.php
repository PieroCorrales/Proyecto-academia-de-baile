<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Regístrate</title>
</head>
<body>
    <h1>Regístrate</h1>
    <form action="http://localhost/proyecto-clases-baile/app/routes/process_register.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" required><br>

    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" required><br>

    <label for="correo_electronico">Correo Electrónico:</label>
    <input type="email" id="correo_electronico" name="correo_electronico" required><br>

    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" name="contraseña" required><br>

    <label for="confirmar_contraseña">Repetir Contraseña:</label>
    <input type="password" id="confirmar_contraseña" name="confirmar_contraseña" required><br>

    <button type="submit">Registrarse</button>
</form>
</body>
</html>