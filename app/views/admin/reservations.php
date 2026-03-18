<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../../models/UserModel.php';
require_once __DIR__ . '/../../controllers/ReservationController.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'administrador') {
    header('Location: ' . BASE_URL . '/app/views/auth/login.php');
    exit;
}

$reservationController = new ReservationController();
$reservas = $reservationController->obtenerTodasLasReservas();
$userModel = new UserModel();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Reservas - DanceWithMe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f0f2f5; }
        .top-navbar { background: linear-gradient(135deg, #0f0c29, #302b63); padding: 0.8rem 1.5rem; }
        .top-navbar a { color: rgba(255,255,255,0.85); text-decoration: none; }
        .top-navbar a:hover { color: #fff; }
        .table th { font-weight: 600; font-size: 0.85rem; text-transform: uppercase;
                    letter-spacing: 0.5px; background: #f8f9fa; }
        .table td { vertical-align: middle; font-size: 0.9rem; }
    </style>
</head>

<body>
    <nav class="top-navbar d-flex align-items-center justify-content-between">
        <a href="users.php">
            <i class="bi bi-arrow-left me-1"></i> Volver al panel
        </a>
        <a href="../../../public/index.php">
            <img src="../../../public/img/logo2.png" alt="Logo" height="40">
        </a>
        <a href="../../routes/cerrar_sesion.php">
            <i class="bi bi-box-arrow-right me-1"></i>Cerrar sesión
        </a>
    </nav>

    <div class="container-fluid px-4 py-4">
        <h1 class="h4 fw-bold mb-4">
            <i class="bi bi-calendar-check me-2 text-primary"></i>Gestión de Reservas
        </h1>

        <?php if (count($reservas) > 0): ?>
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Usuario</th>
                                <th>Clase</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th class="pe-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reservas as $reserva): ?>
                                <?php
                                $usuario = $userModel->buscarPorId($reserva['usuario_id']);
                                $nombreUsuario = $usuario
                                    ? htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellidos'])
                                    : 'Usuario eliminado';
                                $estado = $reserva['estado'];
                                if ($estado === 'aceptada') {
                                    $badge = 'bg-success';
                                } elseif ($estado === 'rechazada') {
                                    $badge = 'bg-danger';
                                } else {
                                    $badge = 'bg-warning text-dark';
                                }
                                ?>
                                <tr>
                                    <td class="ps-4 text-muted">#<?= $reserva['id'] ?></td>
                                    <td><?= $nombreUsuario ?></td>
                                    <td><?= htmlspecialchars($reserva['clase']) ?></td>
                                    <td><?= htmlspecialchars($reserva['fecha']) ?></td>
                                    <td>
                                        <span class="badge <?= $badge ?> rounded-pill px-3 py-2">
                                            <?= ucfirst($estado) ?>
                                        </span>
                                    </td>
                                    <td class="pe-4">
                                        <?php if ($estado === 'pendiente'): ?>
                                            <form action="../../routes/process_reservation_status.php"
                                                  method="POST" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= $reserva['id'] ?>">
                                                <input type="hidden" name="estado" value="aceptada">
                                                <button type="submit" class="btn btn-success btn-sm me-1">
                                                    <i class="bi bi-check-lg me-1"></i>Aceptar
                                                </button>
                                            </form>
                                            <form action="../../routes/process_reservation_status.php"
                                                  method="POST" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= $reserva['id'] ?>">
                                                <input type="hidden" name="estado" value="rechazada">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-x-lg me-1"></i>Rechazar
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <span class="text-muted small">—</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="bi bi-inbox text-muted" style="font-size:3rem;"></i>
                <p class="mt-3 text-muted">No hay reservas registradas.</p>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
