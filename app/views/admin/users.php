<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn-accion {
            cursor: pointer;
            padding: 5px 10px;
            margin: 5px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }
        .btn-aceptar {
            background-color: green;
        }
        .btn-rechazar {
            background-color: red;
        }
    </style>
</head>
<body>
    <h1>Bienvenido, Administrador</h1>

    <!-- Lista de Reservas -->
    <h2>Gestión de Reservas</h2>
    <?php
    session_start();
    if (isset($_SESSION['usuario_id']) && $_SESSION['rol'] === 'administrador') {
        require_once '../../controllers/ReservationController.php';
        $reservationController = new ReservationController();
        $reservas = $reservationController->obtenerTodasLasReservas();

        if (count($reservas) > 0) {
            echo "<table>";
            echo "<tr><th>ID Reserva</th><th>Usuario</th><th>Clase</th><th>Fecha</th><th>Estado</th><th>Acciones</th></tr>";

            foreach ($reservas as $reserva) {
                // Obtener el nombre del usuario
                require_once '../../models/UserModel.php';
                $userModel = new UserModel();
                $usuario = $userModel->buscarPorId($reserva['usuario_id']);
                $nombreUsuario = $usuario['nombre'] . ' ' . $usuario['apellidos'];

                echo "<tr>";
                echo "<td>" . $reserva['id'] . "</td>";
                echo "<td>" . $nombreUsuario . "</td>";
                echo "<td>" . $reserva['clase'] . "</td>";
                echo "<td>" . $reserva['fecha'] . "</td>";
                echo "<td>" . ucfirst($reserva['estado']) . "</td>";
                echo "<td>";
                if ($reserva['estado'] === 'pendiente') {
                    echo "<form action='/proyecto-clases-baile/app/routes/process_reservation_status.php' method='POST' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $reserva['id'] . "'>";
                    echo "<input type='hidden' name='estado' value='aceptada'>";
                    echo "<button type='submit' class='btn-accion btn-aceptar'>Aceptar</button>";
                    echo "</form>";

                    echo "<form action='/proyecto-clases-baile/app/routes/process_reservation_status.php' method='POST' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $reserva['id'] . "'>";
                    echo "<input type='hidden' name='estado' value='rechazada'>";
                    echo "<button type='submit' class='btn-accion btn-rechazar'>Rechazar</button>";
                    echo "</form>";
                }
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No hay reservas registradas.</p>";
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