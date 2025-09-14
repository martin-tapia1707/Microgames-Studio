<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Microgames Studio</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../IMG/LogoEmpresa.png" />
    <link rel="stylesheet" href="../Carpeta_CSS/usuario.css">
</head>
<body>
<!-- Header -->
    <header>
        <img src="../IMG/Logo_texto.png" class="logo-texto">
        <div class="botones">
            <button class="boton-login" onclick=""><b>Iniciar Sesión</b></button>
            <button class="boton-login" onclick=""><b>Registrarse</b></button>
        </div>
    </header>

    <div class="principal">
<!-- Sidebar -->
        <div class="barra-lateral">
            <ul>
                <li>
                    <a href="Inicio.html" class="enlace-nav">
                        <span class="icono-item"><i class='bx bxs-home'></i></span>
                        <span class="texto-item">Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="info.html" class="enlace-nav">
                        <span class="icono-item"><i class='bx bxs-info-circle'></i></span>
                        <span class="texto-item">Creadores</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="enlace-nav">
                        <span class="icono-item"><i class='bx bx-task'></i></span>
                        <span class="texto-item">Ayuda</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="enlace-nav activo">
                        <span class="icono-item"><i class='bx bxs-contact'></i></span>
                        <span class="texto-item">Perfil</span>
                    </a>
                </li>
            </ul>
        </div>
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
                </div>
            </section>
        </div>

        <script src="../Carpeta_JS/Inicio.js"></script>
    </div>

</body>
</html>