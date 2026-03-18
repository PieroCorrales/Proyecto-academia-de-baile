<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../../models/UserModel.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'administrador') {
    header('Location: ' . BASE_URL . '/app/views/auth/login.php');
    exit;
}

$id        = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$userModel = new UserModel();
$usuario   = $userModel->buscarPorId($id);

if (!$usuario) {
    die("<p>El usuario no existe.</p>");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - DanceWithMe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f0f2f5; min-height: 100vh; }
        .top-navbar { background: linear-gradient(135deg, #0f0c29, #302b63); padding: 0.8rem 1.5rem; }
        .top-navbar a { color: rgba(255,255,255,0.85); text-decoration: none; }
        .top-navbar a:hover { color: #fff; }
        .form-control { border-radius: 10px; }
        .form-control:focus { border-color: #302b63; box-shadow: 0 0 0 0.2rem rgba(48,43,99,0.2); }
        .btn-save {
            background: linear-gradient(135deg, #302b63, #0f0c29);
            border: none; border-radius: 10px;
        }
        .btn-save:hover { opacity: 0.9; }
    </style>
</head>

<body>
    <nav class="top-navbar d-flex align-items-center justify-content-between">
        <a href="users_data.php">
            <i class="bi bi-arrow-left me-1"></i> Volver a clientes
        </a>
        <a href="../../../public/index.php">
            <img src="../../../public/img/logo2.png" alt="Logo" height="40">
        </a>
        <a href="../../routes/cerrar_sesion.php">
            <i class="bi bi-box-arrow-right me-1"></i>Cerrar sesión
        </a>
    </nav>

    <div class="container py-5" style="max-width: 560px;">
        <div class="card border-0 shadow-sm rounded-3 p-4 p-md-5">
            <h1 class="h4 fw-bold mb-4">
                <i class="bi bi-person-gear me-2 text-primary"></i>Editar Usuario
            </h1>

            <form action="../../routes/process_update_user.php" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label for="nombre" class="form-label fw-medium">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                               value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="apellidos" class="form-label fw-medium">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos"
                               value="<?= htmlspecialchars($usuario['apellidos']) ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="dni" class="form-label fw-medium">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni"
                           value="<?= htmlspecialchars($usuario['dni']) ?>" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label fw-medium">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?= htmlspecialchars($usuario['email']) ?>" required>
                </div>

                <button type="submit" class="btn btn-save btn-primary w-100 py-2 fw-semibold">
                    <i class="bi bi-floppy me-2"></i>Guardar cambios
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
