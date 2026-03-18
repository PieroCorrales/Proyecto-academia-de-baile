<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="DanceWithMe" />
    <title>DanceWithMe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css?v=1.1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?v=1.0" />
</head>

<body>
    <?php include 'layouts/header.php' ?>

    <div id="carouselProfesoresFade" class="carousel slide carousel-fade" data-ride="carousel" style="position: relative;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/diverse-group-of-multiethnic-dancers-or-performers-2025-01-16-12-01-08-utc.webp" class="d-block w-100" alt="Bailarines en grupo">
            </div>
            <div class="carousel-item">
                <img src="img/skillful-dancers-performing-in-the-dark-room-under-2023-11-27-04-50-12-utc.webp" class="d-block w-100" alt="Bailarines actuando">
            </div>
            <div class="carousel-item">
                <img src="img/moving-to-the-music-2024-10-18-07-00-58-utc.webp" class="d-block w-100" alt="Bailarina en movimiento">
            </div>
        </div>
        <h1 class="title"> VEN Y BAILA CON NOSOTROS </h1>
        <a class="carousel-control-prev" href="#carouselProfesoresFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselProfesoresFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <section class="text-center d-flex justify-content-center">
        <div id="text-box">
            <p id="text">Porque la vida se vive mejor bailando</p>
        </div>
    </section>

    <section style="padding: 1rem 3rem 1rem 3rem;">
        <div style="text-align: center;">
            <h3 style="font-size: 22px; background-color:rgba(152, 152, 152, 0.62);">Nuestras clases</h3>
        </div>
        <div class="grid-container">
            <div class="grid-item reveal" style="transition-delay: 0.05s">
                <a href="estilos.php#bailes-latinos">
                    <img src="img/many-of-people-around-couple-dancing-at-nightime-2023-11-27-05-07-43-utc.webp" alt="Image 1">
                    <p>Clases de ritmos latinos</p>
                </a>
            </div>
            <div class="grid-item reveal" style="transition-delay: 0.15s">
                <a href="estilos.php#yoga">
                    <img src="img/stretching-makes-for-elastic-muscles-2024-03-15-15-11-09-utc.webp" alt="Image 2">
                    <p>Clases de yoga</p>
                </a>
            </div>
            <div class="grid-item reveal" style="transition-delay: 0.25s">
                <a href="estilos.php#salsa">
                    <img src="img/people-dancing-in-gym-2025-02-11-18-50-27-utc.webp" alt="Image 3">
                    <p>Clases de salsa</p>
                </a>
            </div>
            <div class="grid-item reveal" style="transition-delay: 0.35s">
                <a href="estilos.php#tango">
                    <img src="img/beautiful-passionate-dancers-dancing-2024-10-19-20-58-50-utc.webp" alt="Image 4">
                    <p>Clases de tango</p>
                </a>
            </div>
            <div class="grid-item reveal" style="transition-delay: 0.45s">
                <a href="estilos.php#hip-hop">
                    <img src="img/group-of-energetic-teenagers-in-activewear-repeati-2023-11-27-05-14-46-utc.webp" alt="Image 5">
                    <p>Clases de Hip Hop</p>
                </a>
            </div>
            <div class="grid-item reveal" style="transition-delay: 0.55s">
                <a href="#">
                    <img src="img/group-of-people-2025-02-10-08-37-53-utc.webp" alt="Image 5">
                    <p>Pronto tendremos más clases disponibles</p>
                </a>
            </div>
        </div>
    </section>
    <section class="container section-container reveal">
        <h2 class="text-center mb-4">Nuestros alumnos nos recomiendan</h2>
        <div class="row justify-content-center">
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Jose Lopez del Moral</h5>
                            <div class="rating">
                                <span class="text-warning">⭐⭐⭐⭐⭐</span>
                            </div>
                        </div>
                        <p class="card-text">"DanceWithMe ha cambiado mi forma de bailar. Los instructores son muy profesionales y el ambiente es increíble. ¡Recomiendo 100%!"</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Marta Sanchez</h5>
                            <div class="rating">
                                <span class="text-warning">⭐⭐⭐⭐⭐</span>
                            </div>
                        </div>
                        <p class="card-text">"Las clases son divertidas y muy dinámicas. He mejorado mucho mi técnica, y sobre todo, he hecho nuevos amigos. ¡Es un lugar genial!"</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Cesar Augusto</h5>
                            <div class="rating">
                                <span class="text-warning">⭐⭐⭐⭐⭐</span>
                            </div>
                        </div>
                        <p class="card-text">"El ambiente en DanceWithMe es muy acogedor y los profesores están siempre dispuestos a ayudar. Me encanta cómo se adaptan a cada nivel. ¡Estoy encantado!"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="background-color: rgba(240, 234, 234, 0.62);" class="reveal">
        <div class="container section-container">
            <div class="row align-items-center">
                <div class="col-md-6 image-container">
                    <img src="img/shot-of-a-group-of-ballet-dancers-standing-togethe-2023-11-27-05-32-50-utc.webp" alt="Image 6">
                </div>
                <div class="col-md-6 text-container">
                    <h2 class="fw-bold">Tu primera clase de baile gratis</h2>
                    <p>Ven y prueba ya cualquiera de nuestros estilos de baile y no pagues la primera clase</p>
                    <a href="../app/views/auth/register.php" class="btn btn-primary mt-3">Quiero registrarme</a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'layouts/footer.php' ?>

    <script defer src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script>
        // Animación de entrada al hacer scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    </script>
</body>

</html>