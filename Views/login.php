<?php
    include("../Includes/Config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/sidebar.css">
    <link rel="stylesheet" href="../CSS/login.css">
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        
        <div class="header-info">

        <img class="logo" src="../IMG/logopagina.png">

        <div class="content-login">

            <h1 class="text-log-in"><b>Iniciar Sesión</h1>  

        <div class="caja-info">
        
        <p class="user"><b>Nombre de usuario</b></p><br>
        <input type="text" name="nombreL" class="text-box-name-user" placeholder="Nombre de usuario"><br>
        <p class="password"><b>Contraseña</b><a class="forgot" href="RecuperarDatos.php"><p>¿Olvidaste tu contraseña?</p></a></p><br>
        <input id="password-input" type="password" name="contraseñaL" class="text-box-password" placeholder="Contraseña"><br><button id="view-password" type="button" class="password-button" onclick="view()">X</button>
        <input type="submit" value="Iniciar sesion" name="Login" class="make"><br><br><br>
        

        
        <a href="Mainsite.php?section=register" class="sign-in">
        <p>¿No tenés una cuenta? ¡Creala ya!</p></a><br>
        
        <?php
        include("../Database/Controlador_Login.php");
        ?>
        </div>
        </div>
        

    </div>

       
    </form>

    <script src="../JS/login.js"></script>
</body>
</html>

