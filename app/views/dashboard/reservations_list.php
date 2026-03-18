<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../../controllers/ReservationController.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: ' . BASE_URL . '/app/views/auth/login.php');
    exit;
}

$reservationController = new ReservationController();
$reservas = $reservationController->obtenerReservasPorUsuario($_SESSION['usuario_id']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservas - DanceWithMe</title>
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
        .reserva-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            transition: transform 0.15s ease;
        }
        .reserva-card:hover { transform: translateY(-2px); }
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

    <div class="container py-5" style="max-width: 860px;">
        <h1 class="h3 fw-bold mb-4">
            <i class="bi bi-list-check me-2 text-primary"></i>Mis Reservas
        </h1>

        <?php if (count($reservas) > 0): ?>
            <div class="row g-3">
                <?php foreach ($reservas as $reserva): ?>
                    <?php
                    $estado = $reserva['estado'];
                    if ($estado === 'aceptada') {
                        $badgeClass = 'bg-success';
                        $icon = 'bi-check-circle-fill';
                    } elseif ($estado === 'rechazada') {
                        $badgeClass = 'bg-danger';
                        $icon = 'bi-x-circle-fill';
                    } else {
                        $badgeClass = 'bg-warning text-dark';
                        $icon = 'bi-clock-fill';
                    }
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="reserva-card card p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-semibold mb-0"><?= htmlspecialchars($reserva['clase']) ?></h6>
                                <span class="badge <?= $badgeClass ?> d-flex align-items-center gap-1">
                                    <i class="bi <?= $icon ?>"></i>
                                    <?= ucfirst($estado) ?>
                                </span>
                            </div>
                            <p class="text-muted small mb-0">
                                <i class="bi bi-calendar3 me-1"></i>
                                <?= htmlspecialchars($reserva['fecha']) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
                <p class="mt-3 text-muted">Todavía no tienes reservas.</p>
                <a href="reservations.php" class="btn btn-primary">
                    <i class="bi bi-calendar-plus me-2"></i>Reservar una clase
                </a>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
