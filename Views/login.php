<?php
    include("../Includes/Config.php");
    // Procesamos la lógica del login ANTES de renderizar cualquier HTML
   include("../Database/Controlador_Login.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/sidebar.css">
    <link rel="stylesheet" href="../CSS/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Login - RODENTGAMES</title>
</head>
<body>

    <form method="post" action="">
        <div class="header-info">
            
            <!-- Logo que te devuelve a Home al hacer clic -->
            <a href="Mainsite.php">
                <img class="logo" src="../IMG/logopagina.png" alt="Logo RODENTGAMES">
            </a>

            <div class="content-login">

                <h1 class="text-log-in"><b>Iniciar Sesión</b></h1>  

                <div class="caja-info">
                    
                    <!-- Campo Nombre de Usuario -->
                    <div class="field-group">
                        <label class="user" for="nombreL"><b>Nombre de usuario</b></label>
                        <input type="text" id="nombreL" name="nombreL" class="text-box-name-user" placeholder="Nombre de usuario" required>
                    </div>

                    <!-- Campo Contraseña -->
                    <div class="field-group">
                        <label class="password" for="password-input"><b>Contraseña</b></label>
                        <div class="password-wrapper">
                            <input id="password-input" type="password" name="contraseñaL" class="text-box-password" placeholder="Contraseña" required>
                            <button id="view-password" type="button" class="password-button" onclick="view()">X</button>
                        </div>
                    </div>

                    <!-- Enlace Olvidé mi Contraseña -->
                    <a class="forgot" href="RecuperarDatos.php">¿Olvidaste tu contraseña?</a>

                    <!-- Botón Iniciar Sesión -->
                    <input type="submit" value="Iniciar sesión" name="Login" class="make">
                    <?php
                    
 include("../Database/Controlador_Login.php");
 ?>
                    <!-- Enlace Registrarse -->
                    <a href="Mainsite.php?section=register" class="sign-in">
                        <p>¿No tenés una cuenta? ¡Creala ya!</p>
                    </a>

                </div>
            </div>

        </div>
    </form>

    <script src="../JS/login.js"></script>
</body>
</html>