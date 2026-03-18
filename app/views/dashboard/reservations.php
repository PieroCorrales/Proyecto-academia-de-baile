<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../../controllers/ReservationController.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: ' . BASE_URL . '/app/views/auth/login.php');
    exit;
}

// Calcular mes a mostrar (mes actual; si estamos en los últimos 5 días, mostrar el siguiente)
$ahora = new DateTime();
$year  = (int)$ahora->format('Y');
$month = (int)$ahora->format('m');

if ((int)$ahora->format('d') >= 26) {
    $month++;
    if ($month > 12) { $month = 1; $year++; }
}

$inicioMes = new DateTime("$year-$month-01");
$finMes    = new DateTime("$year-$month-" . $inicioMes->format('t'));

$meses = ['','Enero','Febrero','Marzo','Abril','Mayo','Junio',
          'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
$nombreMes = $meses[$month] . ' ' . $year;

$reservationController = new ReservationController();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar clase - DanceWithMe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f0f2f5; }
        .top-navbar {
            background: linear-gradient(135deg, #0f0c29, #302b63);
            padding: 0.8rem 1.5rem;
        }
        .top-navbar a { color: rgba(255,255,255,0.85); text-decoration: none; }
        .top-navbar a:hover { color: #fff; }

        /* Cabeceras de días */
        .cal-header {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 6px;
            margin-bottom: 4px;
        }
        .cal-header span {
            text-align: center;
            font-size: 0.75rem;
            font-weight: 600;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Grilla de días */
        .cal-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 6px;
        }
        .cal-day {
            background: #fff;
            border-radius: 12px;
            padding: 0.6rem 0.4rem;
            min-height: 130px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            font-size: 0.78rem;
            overflow-y: auto;
        }
        .cal-day.weekend { background: #f8f9fa; }
        .cal-day.empty   { background: transparent; box-shadow: none; }
        .day-num {
            font-size: 1rem;
            font-weight: 700;
            color: #343a40;
            margin-bottom: 4px;
        }
        .clase-disponible {
            display: block;
            background: #e6f4ea;
            color: #2e7d32;
            border-radius: 6px;
            padding: 3px 5px;
            margin-bottom: 3px;
            cursor: pointer;
            transition: background 0.15s ease;
            line-height: 1.3;
        }
        .clase-disponible:hover { background: #c8e6c9; }
        .clase-llena {
            display: block;
            background: #fce8e6;
            color: #c62828;
            border-radius: 6px;
            padding: 3px 5px;
            margin-bottom: 3px;
            line-height: 1.3;
            font-style: italic;
        }
        .cal-day.past { opacity: 0.4; }
        .cal-day.past .day-num { color: #adb5bd; }

        @media (max-width: 768px) {
            .cal-grid, .cal-header { grid-template-columns: repeat(5, 1fr); }
            .cal-day { min-height: 90px; font-size: 0.7rem; }
        }
        @media (max-width: 500px) {
            .cal-grid, .cal-header { grid-template-columns: repeat(3, 1fr); }
            .cal-day { min-height: 80px; padding: 0.4rem; }
        }
    </style>
</head>

<body>
    <nav class="top-navbar d-flex align-items-center justify-content-between">
        <a href="profile.php">
            <i class="bi bi-arrow-left me-1"></i> Volver al panel
        </a>
        <a href="../../../public/index.php">
            <img src="../../../public/img/logo2.png" alt="Logo" height="40">
        </a>
        <a href="../../routes/cerrar_sesion.php">
            <i class="bi bi-box-arrow-right me-1"></i>Cerrar sesión
        </a>
    </nav>

    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="text-center mb-4">
            <h1 class="h3 fw-bold"><?= htmlspecialchars($nombreMes) ?></h1>
            <p class="text-muted small">Haz clic en una clase disponible para reservar</p>
        </div>

        <!-- Cabeceras de días de semana -->
        <div class="cal-header">
            <?php foreach (['Lun','Mar','Mié','Jue','Vie','Sáb','Dom'] as $d): ?>
                <span><?= $d ?></span>
            <?php endforeach; ?>
        </div>

        <!-- Días del mes -->
        <div class="cal-grid">
            <?php
            $primerDiaSemana = (int)$inicioMes->format('N');
            for ($i = 1; $i < $primerDiaSemana; $i++) {
                echo '<div class="cal-day empty"></div>';
            }

            $hoy = new DateTime('today');
            $currentDate = clone $inicioMes;
            $diasEspañol = [
                'Monday'    => 'lunes',
                'Tuesday'   => 'martes',
                'Wednesday' => 'miercoles',
                'Thursday'  => 'jueves',
                'Friday'    => 'viernes',
                'Saturday'  => 'sabado',
                'Sunday'    => 'domingo',
            ];

            while ($currentDate <= $finMes) {
                $diaSemana       = (int)$currentDate->format('N');
                $fecha           = $currentDate->format('Y-m-d');
                $diaNumero       = $currentDate->format('d');
                $diaEspañol      = $diasEspañol[$currentDate->format('l')];
                $esWeekend  = $diaSemana >= 6;
                $esPasado   = $currentDate < $hoy;
                $extraClass = $esWeekend ? 'weekend' : ($esPasado ? 'past' : '');

                echo "<div class='cal-day $extraClass'>";
                echo "<div class='day-num'>$diaNumero</div>";

                if (!$esWeekend && !$esPasado) {
                    $clasesDisponibles = $reservationController->obtenerClasesPorDia($diaEspañol);
                    foreach ($clasesDisponibles as $clase) {
                        $claseNombre = htmlspecialchars($clase['clase_nombre']);
                        $horaInicio  = htmlspecialchars($clase['hora_inicio']);
                        $horaFin     = htmlspecialchars($clase['hora_fin']);
                        if ($reservationController->tieneEspacioDisponible($clase['clase_nombre'], $fecha)) {
                            echo "<span class='clase-disponible'
                                       onclick='confirmarReserva(\"{$claseNombre}\", \"{$fecha}\", \"{$horaInicio}\", \"{$horaFin}\")'>
                                       {$claseNombre}<br><small>{$horaInicio} - {$horaFin}</small>
                                  </span>";
                        } else {
                            echo "<span class='clase-llena'>{$claseNombre}<br><small>Completa</small></span>";
                        }
                    }
                }

                echo "</div>";
                $currentDate->modify('+1 day');
            }
            ?>
        </div>

        <form id="reservaForm" action="../../routes/process_reservation.php" method="POST" style="display:none;">
            <input type="hidden" name="clase" id="claseInput">
            <input type="hidden" name="fecha" id="fechaInput">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmarReserva(clase, fecha, horaInicio, horaFin) {
            if (confirm(`¿Reservar "${clase}" el ${fecha} de ${horaInicio} a ${horaFin}?`)) {
                document.getElementById('claseInput').value = clase;
                document.getElementById('fechaInput').value = fecha;
                document.getElementById('reservaForm').submit();
            }
        }
    </script>
</body>
</html>
