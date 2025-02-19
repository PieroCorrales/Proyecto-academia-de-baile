<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Clases</title>
</head>
<body>
    <h1>Gestión de Clases</h1>
    <?php
    session_start();
    if (isset($_SESSION['usuario_id']) && $_SESSION['rol'] === 'administrador') {
        require_once '../../controllers/ClassController.php';
        $classController = new ClassController();
        $clases = $classController->obtenerTodasLasClases();

        if (count($clases) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Día</th><th>Hora de Inicio</th><th>Hora de Fin</th><th>Capacidad</th><th>Acciones</th></tr>";

            foreach ($clases as $clase) {
                echo "<tr>";
                echo "<td>" . $clase['id'] . "</td>";
                echo "<td>" . $clase['nombre'] . "</td>";
                echo "<td>" . ucfirst($clase['dia']) . "</td>";
                echo "<td>" . $clase['hora_inicio'] . "</td>";
                echo "<td>" . $clase['hora_fin'] . "</td>";
                echo "<td>" . $clase['capacidad'] . "</td>";
                echo "<td>";
                echo "<form action='/proyecto-clases-baile/app/routes/process_class_edit.php' method='POST' style='display:inline;'>";
                echo "<input type='hidden' name='id' value='" . $clase['id'] . "'>";
                echo "<button type='submit'>Editar</button>";
                echo "</form>";

                echo "<form action='/proyecto-clases-baile/app/routes/process_class_delete.php' method='POST' style='display:inline;'>";
                echo "<input type='hidden' name='id' value='" . $clase['id'] . "'>";
                echo "<button type='submit'>Eliminar</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No hay clases registradas.</p>";
        }
    } else {
        echo "<p>No tienes permiso para acceder a este panel.</p>";
        header('Refresh:2; url=/proyecto-clases-baile/app/views/auth/login.php');
        exit;
    }
    ?>

    <!-- Enlace para Cerrar Sesión -->
    <a href="/proyecto-clases-baile/app/routes/cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>