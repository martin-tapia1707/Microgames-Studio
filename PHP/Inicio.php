<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Microgames Studio</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../IMG/LogoEmpresa.png" />
    <link rel= "stylesheet" href= "../CSS/EstiloInicio.css">
    <link rel= "stylesheet" href= "../CSS/header.css">
    <link rel= "stylesheet" href= "../CSS/sidebar.css">

</head>
<body>
    <div class="contenedorPrincipal">

    <!-- Sidebar / Header -->

    <?php
    require_once "header.php";
    require_once "sidebar.php";
    ?>

    <!-- Contenido principal -->

        <div class="content">
                <div class="juego juegoSelect" style="background-image: url('../IMG/IconoJuego.jpg');"></div>
                <div class="juego juegoSecuizq" style="background-image: url('../IMG/Tapia.jpg');"></div>
                <div class="juego juegoSecuder" style="background-image: url('../IMG/perfiljohn.jpg');"></div>
        </div>

        <script src="../JS/Inicio.js"></script>

    </div>

</body>
</html>