<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate - DanceWithMe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="auth.css">
</head>

<body class="d-flex align-items-center justify-content-center py-5">

    <a href="../../../public/index.php" class="link-back position-fixed top-0 start-0 m-3">
        <i class="bi bi-arrow-left me-1"></i> Volver al inicio
    </a>

    <div class="container" style="max-width: 480px;">
        <div class="auth-card bg-white p-4 p-md-5">
            <div class="text-center mb-4">
                <img src="../../../public/img/logo2.png" alt="Logo DanceWithMe" id="logo" class="mb-3">
                <h1 class="h3 fw-bold mb-1">Crear cuenta</h1>
                <p class="text-muted small">Únete a DanceWithMe y empieza a bailar</p>
            </div>

            <form action="../../routes/process_register.php" method="POST"
                  id="register_form" onsubmit="return validarFormulario(event)">

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label for="nombre" class="form-label fw-medium">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                               placeholder="Tu nombre" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="apellidos" class="form-label fw-medium">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos"
                               placeholder="Tus apellidos" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="dni" class="form-label fw-medium">DNI</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                        <input type="text" class="form-control" id="dni" name="dni"
                               placeholder="12345678A" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="correo_electronico" class="form-label fw-medium">Correo electrónico</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="correo_electronico"
                               name="correo_electronico" placeholder="tu@email.com" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="contraseña" class="form-label fw-medium">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="contraseña"
                               name="contraseña" placeholder="Mín. 4 caracteres" required>
                    </div>
                    <div class="form-text">Entre 4 y 12 caracteres, con letra, número y carácter especial.</div>
                </div>

                <div class="mb-4">
                    <label for="confirmar_contraseña" class="form-label fw-medium">Confirmar contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="confirmar_contraseña"
                               name="confirmar_contraseña" placeholder="Repite tu contraseña" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                    <i class="bi bi-person-plus me-2"></i>Crear cuenta
                </button>
            </form>

            <hr class="my-4">
            <p class="text-center text-muted small mb-0">
                ¿Ya tienes cuenta? <a href="login.php" class="fw-semibold text-decoration-none">Inicia sesión</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="register_validation.js"></script>
</body>
</html>
