<?php
    include("C:/xampp/htdocs/Microgames-Studio/Includes/Config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
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
        <input type="password" name="contraseñaL" class="text-box-password" type="text" placeholder="Contraseña" id="password-input"><button id="view-password" type="button" class="pass-button" onclick="view()">X</button><br>
        <input type="submit" value="Iniciar sesion" name="Login" class="make"><br><br><br>
        <?php
        include("../Includes/Config.php");
        include("../Database/Controlador_Login.php");
        ?>


        <a href="Mainsite.php?section=register" class="sign-in">
        <p>¿No tenés una cuenta? ¡Creala ya!</p></a>

        </div>
        </div>

    </div>
    </form>
        <script src="../JS/edit.js"></script>
</body>
</html>

