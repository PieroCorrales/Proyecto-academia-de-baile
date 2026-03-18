<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../../models/UserModel.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'administrador') {
    header('Location: ' . BASE_URL . '/app/views/auth/login.php');
    exit;
}

$userModel = new UserModel();
$usuarios  = $userModel->obtenerTodosLosUsuarios();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes - DanceWithMe</title>
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
            <i class="bi bi-people-fill me-2 text-primary"></i>Gestión de Clientes
        </h1>

        <?php if (count($usuarios) > 0): ?>
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>DNI</th>
                                <th>Email</th>
                                <th class="pe-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr>
                                    <td class="ps-4 text-muted">#<?= $usuario['id'] ?></td>
                                    <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                                    <td><?= htmlspecialchars($usuario['apellidos']) ?></td>
                                    <td><?= htmlspecialchars($usuario['dni']) ?></td>
                                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                                    <td class="pe-4">
                                        <form action="../../routes/process_edit_user.php"
                                              method="POST" style="display:inline;">
                                            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                                            <button type="submit" class="btn btn-warning btn-sm me-1">
                                                <i class="bi bi-pencil-fill me-1"></i>Editar
                                            </button>
                                        </form>
                                        <form action="../../routes/process_delete_user.php"
                                              method="POST" style="display:inline;"
                                              onsubmit="return confirm('¿Eliminar a <?= htmlspecialchars($usuario['nombre'], ENT_QUOTES) ?>?');">
                                            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash-fill me-1"></i>Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="bi bi-people text-muted" style="font-size:3rem;"></i>
                <p class="mt-3 text-muted">No hay clientes registrados.</p>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
