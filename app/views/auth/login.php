<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - DanceWithMe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="auth.css">
</head>

<body class="d-flex align-items-center justify-content-center py-5">

    <a href="../../../public/index.php" class="link-back position-fixed top-0 start-0 m-3">
        <i class="bi bi-arrow-left me-1"></i> Volver al inicio
    </a>

    <div class="container" style="max-width: 440px;">
        <div class="auth-card bg-white p-4 p-md-5">
            <div class="text-center mb-4">
                <img src="../../../public/img/logo2.png" alt="Logo DanceWithMe" id="logo" class="mb-3">
                <h1 class="h3 fw-bold mb-1">Iniciar Sesión</h1>
                <p class="text-muted small">Bienvenido de nuevo a DanceWithMe</p>
            </div>

            <form action="../../routes/process_login.php" method="POST">
                <div class="mb-3">
                    <label for="correo_electronico" class="form-label fw-medium">Correo electrónico</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="correo_electronico"
                               name="correo_electronico" placeholder="tu@email.com" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="contraseña" class="form-label fw-medium">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="contraseña"
                               name="contraseña" placeholder="Tu contraseña" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
                </button>
            </form>

            <hr class="my-4">
            <p class="text-center text-muted small mb-0">
                ¿No tienes cuenta? <a href="register.php" class="fw-semibold text-decoration-none">Regístrate aquí</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
