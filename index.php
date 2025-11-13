<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLab - Club de Programación</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Sección: Header/Navegación -->
    <?php include 'includes/header.php'; ?>

    <!-- Sección: Conoce sobre CodeLab -->
    <section class="seccion-conoce">
        <h2 class="titulo-seccion">Conoce sobre CodeLab</h2>
        <div class="contenedor-conoce">
            <div class="tarjeta-texto">
                <div class="etiqueta-tarjeta">
                    <span>Lorem Ipsum</span>
                    <span>•</span>
                    <span>---</span>
                </div>
                <p class="texto-principal">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                </p>
                <div class="botones-navegacion">
                    <button class="btn-nav btn-nav-prev" aria-label="Anterior">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L6 10L12 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="btn-nav btn-nav-next" aria-label="Siguiente">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 4L14 10L8 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="imagen-persona">
                <img src="assets/img/logo-registro-login.png" alt="CodeLab">
            </div>
        </div>
    </section>

    <!-- Sección: Clases Presenciales / Sobre Nosotros -->
    <section class="seccion-clases">
        <div class="encabezado-seccion"></div>
        <div class="contenedor-tarjetas">
            <div class="tarjeta"></div>
            <div class="tarjeta"></div>
            <div class="tarjeta"></div>
        </div>
    </section>

    <!-- Sección: Nuestro Desempeño -->
    <?php include 'includes/seccion-desempeno.php'; ?>

    <!-- Sección: Herramientas utilizadas -->
    <section class="seccion-herramientas">
        <div class="encabezado-herramientas"></div>
        <div class="contenedor-iconos">
            <div class="icono-herramienta"></div>
            <div class="icono-herramienta"></div>
            <div class="icono-herramienta"></div>
            <div class="icono-herramienta"></div>
            <div class="icono-herramienta"></div>
            <div class="icono-herramienta"></div>
        </div>
    </section>

    <!-- Sección: Deseo Formar Parte De CodeLab -->
    <section class="seccion-unirse">
        <div class="contenedor-unirse">
            <div class="ilustracion"></div>
            <div class="contenido-texto"></div>
        </div>
    </section>

    <!-- Sección: Nuestros miembros -->
    <?php include 'includes/seccion-miembros.php'; ?>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/script.js"></script>
    <script src="assets/js/miembros.js"></script>
</body>
</html>