<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLab - Club de Programación</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- Sección: Header/Navegación -->
    <?php include 'includes/header.php'; ?>

    <!-- Sección: Conoce sobre CodeLab -->
    <section class="seccion-conoce">
        <div class="contenedor-conoce">
            <div class="tarjeta-texto"></div>
            <div class="imagen-persona"></div>
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
</body>
</html>