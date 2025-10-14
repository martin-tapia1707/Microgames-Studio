
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/sidebar.css">
    <link rel="stylesheet" href="../CSS/register.css">

    <title>Register</title>
</head>
<body>
    <div class="header-info">

        <img class="logo" src="../IMG/logopagina.png">

        <div class="content-register">

        <h1 class="text-register"><b>Registrarse</b></h1>  
        
        <div class="caja-info">

        <a href="Mainsite.php?section=login" class="sign-up">
        <p>¿Ya tenés una cuenta? ¡¡inicia sesión!!</p></a>



        <form action="../Database/InsertarUsuario.php" method="post">
            <br>
            <p class="user"><b>Nombre de usuario</b></p><br>
            <input type="text" name="nombre" class="text-box-name-user" placeholder="Nombre de usuario"><br>
            <p class="password"><b>Contraseña</b></p><br>
            <input type="password" name="contraseña" class="text-box-password"  placeholder="Contraseña" id="password-input"><button id="view-password" type="button" class="pass-button" onclick="view()">X</button><br><br>
            <p class="repeat"><b>Repetir contraseña</b></p><br>
            <input type="password" name="contraseñaRep" class="text-box-repeat-password" placeholder="Repetir contraseña" id="repeat-password-input"><button id="view-repeat-password" type="button" class="repeat-button" onclick="repeat()">X</button><br>
            <p class="mail"><b>Correo electronico</b></p><br>
            <input type="email" name="correo" class="text-box-mail" type="text" placeholder="Correo electronico"><br>      
            <input type="submit" value="registrarse" name="registrar" class="make">
        </form>
    </div>
    <script src="../JS/edit.js"></script>
</body>
</html>

