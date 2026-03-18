<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css?v=1.1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Quienes somos</title>
</head>

<body>
    <?php include 'layouts/header.php' ?>

    <section class="container section-container">
        <div class="row align-items-center">
            <!-- Texto explicativo a la izquierda -->
            <div class="col-md-6">
                <h1>¿Quiénes somos?</h1>
                <p>
                    Somos una academia de baile comprometida con ofrecer una experiencia única en cada paso.
                    Nos especializamos en estilos de baile como salsa, tango, hip-hop y más, brindando a nuestros
                    estudiantes la oportunidad de explorar su pasión por la danza.
                    <br><br>
                    Ubicados en Madrid, nos encontramos en el corazón de la ciudad para ofrecerte
                    un espacio donde la música y el movimiento se encuentran. Elegimos Madrid porque es una ciudad
                    vibrante, llena de vida, cultura y arte, lo que nos inspira a crecer y compartir nuestra pasión por el
                    baile con todos.
                </p>
            </div>
            <div class="col-md-6">
                <img src="img/man-dancing-with-group-2025-02-11-15-49-30-utc.webp" alt="DanceWithMe Academy" style="width: 100%; border-radius: 10px;">
            </div>
        </div>
    </section>

    <section class="container section-container">
        <div class="row">
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12017.141272786014!2d-3.725020550000004!3d40.407600550000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd42287feefbb05b%3A0xa84667db9b2b69e6!2sPaseo%20Extremadura%2034%2C%2028005%20Madrid%2C%20España!5e0!3m2!1ses!2ses!4v1635152821004!5m2!1ses!2ses" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-6" style=" display: flex; flex-direction: column; justify-content: center;">
                <h1>¿Dónde estamos?</h1>
                <p>Nos encontramos en Paseo Extremadura 34, Madrid, un lugar ideal para aprender y disfrutar de clases de baile. Visítanos para conocer más sobre nuestros estilos y actividades.</p>
            </div>
        </div>
    </section>
    <section class="container section-container">
    <h2 class="text-center mb-4">Nuestros alumnos nos recomiendan</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">David Ramírez</h5>
                        <div class="rating">
                            <span class="text-warning">⭐⭐⭐⭐⭐</span>
                        </div>
                    </div>
                    <p class="card-text">"DanceWithMe ha cambiado mi forma de bailar. Los instructores son muy profesionales y el ambiente es increíble. ¡Recomiendo 100%!"</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">María López</h5>
                        <div class="rating">
                            <span class="text-warning">⭐⭐⭐⭐⭐</span>
                        </div>
                    </div>
                    <p class="card-text">"Las clases son divertidas y muy dinámicas. He mejorado mucho mi técnica, y sobre todo, he hecho nuevos amigos. ¡Es un lugar genial!"</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Carlos Sánchez</h5>
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


    <?php include 'layouts/footer.php' ?>

</body>

</html>