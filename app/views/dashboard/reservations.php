<?php
// Iniciar la sesión al principio del archivo
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    die("<p>No has iniciado sesión.</p>");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Reservas</title>
    <style>
        .calendario {
            border-collapse: collapse;
            width: 100%;
        }
        .calendario td, .calendario th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .no-valido {
            background-color: #f4f4f4;
            pointer-events: none; /* Deshabilitar clic */
            opacity: 0.5; /* Opacidad para indicar no válido */
        }
        .clase-disponible {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Mis Reservas</h1>

    <!-- Calendario Completo del Mes de Marzo -->
    <h2>Calendario de Clases - Marzo 2025</h2>
    <table class="calendario">
        <tr>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sábado</th>
            <th>Domingo</th>
        </tr>
        <tr>
            <?php
            // Configurar el rango de fechas para marzo 2025
            $inicioMarzo = new DateTime('2025-03-01');
            $finMarzo = new DateTime('2025-03-31');

            // Encontrar el primer día del mes y su posición en la semana
            $primerDiaMes = clone $inicioMarzo;
            $primerDiaSemana = (int)$primerDiaMes->format('N'); // 1 = lunes, ..., 7 = domingo

            // Rellenar los días anteriores al inicio del mes
            for ($i = 1; $i < $primerDiaSemana; $i++) {
                echo "<td></td>";
            }

            // Iterar sobre todos los días de marzo
            $currentDate = clone $inicioMarzo;
            while ($currentDate <= $finMarzo) {
                $diaSemana = (int)$currentDate->format('N'); // 1 = lunes, ..., 7 = domingo
                $fecha = $currentDate->format('Y-m-d');
                $diaNumero = $currentDate->format('d');
                $diaNombreIngles = $currentDate->format('l'); // Nombre del día en inglés

                // Convertir el nombre del día a español
                $diasEspañol = [
                    'Monday' => 'lunes',
                    'Tuesday' => 'martes',
                    'Wednesday' => 'miercoles',
                    'Thursday' => 'jueves',
                    'Friday' => 'viernes',
                    'Saturday' => 'sabado',
                    'Sunday' => 'domingo'
                ];
                $diaEspañol = strtolower($diasEspañol[$diaNombreIngles]);

                // Mostrar clases solo en días laborables
                if ($diaSemana >= 1 && $diaSemana <= 5) { // Solo lunes a viernes
                    // Obtener clases disponibles para este día
                    require_once '../../controllers/ReservationController.php';
                    $reservationController = new ReservationController();
                    $clasesDisponibles = $reservationController->obtenerClasesPorDia($diaEspañol);

                    echo "<td>";
                    echo "<div>$diaNumero</div>";
                    foreach ($clasesDisponibles as $clase) {
                        echo "<div class='clase-disponible' onclick='confirmarReserva(\"{$clase['clase_nombre']}\", \"$fecha\", \"{$clase['hora_inicio']}\", \"{$clase['hora_fin']}\")'>{$clase['clase_nombre']} ({$clase['hora_inicio']} - {$clase['hora_fin']})</div>";
                    }
                    echo "</td>";
                } else {
                    // Días no válidos (sábado y domingo)
                    echo "<td class='no-valido'></td>";
                }

                // Cambiar de fila después de 7 días
                if ($currentDate->format('w') == 0 || $currentDate->format('w') == 6) { // Sábado (6) o Domingo (0)
                    if ($currentDate->format('w') == 0) { // Si es domingo, cerrar la fila
                        echo "</tr><tr>";
                    }
                }

                // Avanzar al siguiente día
                $currentDate->modify('+1 day');
            }

            // Rellenar los días restantes al final del calendario
            $ultimoDiaSemana = (int)$currentDate->modify('-1 day')->format('N'); // Último día de la última semana
            for ($i = $ultimoDiaSemana; $i < 7; $i++) {
                echo "<td></td>";
            }
            ?>
        </tr>
    </table>

    <!-- Formulario Oculto para Reservar -->
    <form id="reservaForm" action="../../routes/process_reservation.php" method="POST" style="display:none;">
        <input type="hidden" name="clase" id="claseInput">
        <input type="hidden" name="fecha" id="fechaInput">
    </form>

    <!-- Popup para Confirmar Reserva -->
    <script>
        function confirmarReserva(clase, fecha, horaInicio, horaFin) {
            if (confirm(`¿Quieres reservar la clase "${clase}" el día ${fecha} de ${horaInicio} a ${horaFin}?`)) {
                document.getElementById('claseInput').value = clase;
                document.getElementById('fechaInput').value = fecha;
                document.getElementById('reservaForm').submit();
            }
        }
    </script>

    <!-- Mostrar Reservas Existentes -->
    <h2>Tus Reservas Actuales</h2>
    <?php
    if (isset($_SESSION['usuario_id'])) {
        require_once '../../controllers/ReservationController.php';
        $reservationController = new ReservationController();
        $reservas = $reservationController->obtenerReservasPorUsuario($_SESSION['usuario_id']);

        if (count($reservas) > 0) {
            echo "<ul>";
            foreach ($reservas as $reserva) {
                echo "<li>Clase: {$reserva['clase']} - Fecha: {$reserva['fecha']} - Estado: <strong>{$reserva['estado']}</strong></li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No tienes reservas realizadas.</p>";
        }
    }
    ?>

    <!-- Enlace para Cerrar Sesión -->
    <a href="/proyecto-clases-baile/app/routes/cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>