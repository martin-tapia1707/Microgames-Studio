<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Microgames Studio</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../IMG/LogoEmpresa.png" />
    <link rel="stylesheet" href="../CSS/user.css">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/sidebar.css">
</head>
<body>

<?php
    require_once "header.php";
    require_once "sidebar.php";
?>

<!-- Contenido principal -->
        <div class="contenido">
            <section class="perfil-contenedor">
                <div class="perfil-cabecera">
                    <img src="../IMG/usuario.png" alt="Avatar" class="perfil-avatar">
                    <div class="perfil-info">
                        <h1>Usuario</h1>
                        <p>Correo</p>
                    </div>
                </div>
                <div class="perfil-detalles">
                    <div class="perfil-bio">
                        <h2>Sobre mí:</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <button class="cambiar-clave">Cambiar contraseña</button>
                </div>
                <div class="perfil-estadisticas">
                    <h2>Registro:</h2>
                    <div class="columna-estadisticas">
                        <p>Juego 1:</p>
                        <p>PuntuajeMax: </p>
                        <p>Horas registradas: </p>
                    </div>
                    <div class="columna-estadisticas">
                        <p>Juego 2:</p>
                        <p>PuntuajeMax: </p>
                        <p>Horas registradas: </p>
                    </div>
                    <div class="columna-estadisticas">
                        <p>Juego 3:</p>
                        <p>PuntuajeMax: </p>
                        <p>Horas registradas: </p>
                    </div>
                    <a href="../Database/Controlador_CerrarLogin.php">Salir</a>
                </div>
            </section>
        </div>
        

        <script src="../Carpeta_JS/Inicio.js"></script>
    </div>

</body>
</html>