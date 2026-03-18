<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../../../config/config.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: ' . BASE_URL . '/app/views/auth/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Panel - DanceWithMe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f2f5;
            min-height: 100vh;
        }
        .top-navbar {
            background: linear-gradient(135deg, #0f0c29, #302b63);
            padding: 0.8rem 1.5rem;
        }
        .top-navbar img { height: 48px; }
        .top-navbar .brand-text {
            color: #fff;
            font-weight: 600;
            font-size: 1.1rem;
            letter-spacing: 1px;
        }
        .dashboard-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }
        .dashboard-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.15);
            color: inherit;
        }
        .card-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin: 0 auto 1rem;
        }
        .icon-blue  { background: #e8f0fe; color: #1a73e8; }
        .icon-green { background: #e6f4ea; color: #34a853; }
        .welcome-badge {
            background: linear-gradient(135deg, #0f0c29, #302b63);
            color: white;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1rem;
        }
    </style>
</head>

<body>
    <nav class="top-navbar d-flex align-items-center justify-content-between">
        <a href="../../../public/index.php" class="d-flex align-items-center gap-2 text-decoration-none">
            <img src="../../../public/img/logo2.png" alt="Logo DanceWithMe">
            <span class="brand-text">DanceWithMe</span>
        </a>
        <a href="../../routes/cerrar_sesion.php" class="btn btn-outline-light btn-sm">
            <i class="bi bi-box-arrow-right me-1"></i>Cerrar sesión
        </a>
    </nav>

    <div class="container py-5">
        <div class="text-center mb-5">
            <div class="welcome-badge">
                <i class="bi bi-person-fill"></i>
            </div>
            <h1 class="h2 fw-bold">¡Bienvenido!</h1>
            <p class="text-muted">¿Qué quieres hacer hoy?</p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-md-4 col-sm-6">
                <a href="reservations.php" class="dashboard-card card p-4 text-center d-block">
                    <div class="card-icon icon-blue">
                        <i class="bi bi-calendar-plus"></i>
                    </div>
                    <h5 class="fw-semibold mb-1">Reservar clase</h5>
                    <p class="text-muted small mb-0">Elige día y clase en el calendario</p>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="reservations_list.php" class="dashboard-card card p-4 text-center d-block">
                    <div class="card-icon icon-green">
                        <i class="bi bi-list-check"></i>
                    </div>
                    <h5 class="fw-semibold mb-1">Mis reservas</h5>
                    <p class="text-muted small mb-0">Consulta el estado de tus clases</p>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
