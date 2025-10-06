<?php
session_start();
?>

<!-- Esto aparece si el usuario esta logueado (foto de perfil, nombre de usuario) -->

<header>
    <a href="Mainsite.php?section=home" class="nav-link">
        <img src="../IMG/Logo_texto.png" class="Logotexto">
    </a> 

    <div class="contenedorBotones">    

<?php 

if (isset($_SESSION["usuario"])): 
?>

<div class="usuario-logueado">

    <!--Muestra tu foto de perfil-->
    <div class="fotousuario">
        <img src="<?php echo $_SESSION["perfil"]; ?>" alt="Foto de perfil">
    
    </div>
    
    <span class="nombre-usuario">

    <!--Muestra tu nombre de usuario-->
        <?php echo $_SESSION["usuario"]; ?>
    </span>
</div>

<!-- Esto aparece si el usuario no esta logueado (los dos botones) -->

<?php 
else: 
?>

    <a href="Mainsite.php?section=login" class="nav-link">
        <button class="Login"><b>Iniciar Sesión</b></button>
    </a>

    <a href="Mainsite.php?section=register" class="nav-link">
        <button class="Login"><b>Registrarse</b></button>
    </a>

<?php 
endif; 
?>

    </div>
</header>

