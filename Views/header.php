<?php session_start(); ?>

<header>
    <a href="Mainsite.php?section=home" class="nav-link">
        <img src="../IMG/Logo_texto.png" class="Logotexto">
    </a>
    
    <div class="contenedorBotones">
        <?php if (isset($_SESSION["usuario"])): ?>
            <div class="usuario-logueado" id="usuarioContainer">

                <div class="fotousuario">
                    <img src="<?php echo $_SESSION["perfil"]; ?>" alt="Foto de perfil">
                </div>

                <span class="nombre-usuario"><?php echo $_SESSION["usuario"]; ?></span>
            </div>
            
            <!-- Menu que se muestra cuando haces click en la foto -->
            <div class="user-info" id="visualizacion">

                <div class="foto-menu">
                    <img src="<?php echo $_SESSION["perfil"]; ?>" alt="Foto de perfil">
                </div>

                <h2 class="nombre-menu"><?php echo $_SESSION["usuario"]; ?></h2>

                <a href="Mainsite.php?section=user" class="menu-link">Ir al perfil</a>
                <a href="../Database/Controlador_CerrarLogin.php" class="menu-link">Cerrar Sesión</a>
            </div>
            
            <?php else: ?>
            <!-- Esto aparece si el usuario no está logueado (los dos botones) -->
            <a href="Mainsite.php?section=login" class="nav-link">
                <button class="Login"><b>Iniciar Sesión</b></button>
            </a>
            <a href="Mainsite.php?section=register" class="nav-link">
                <button class="Login"><b>Registrarse</b></button>
            </a>
        <?php endif; ?>
    </div>
</header>

<script src="../js/header.js"></script>