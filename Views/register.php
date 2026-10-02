<?php
    include("../Includes/Config.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/sidebar.css">
    <link rel="stylesheet" href="../CSS/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Registro - Gaming</title>
</head>

<body>
    <div class="header-info">

        <img class="logo" src="../IMG/logopagina.png" alt="Logo">

        <div class="content-register">

            <div class="register-header">
                <h1 class="text-register"><b>Registrarse</b></h1>
                <a href="Mainsite.php?section=login" class="sign-up">
                    ¿Ya tenés una cuenta? ¡Iniciá sesión!
                </a>
            </div>

            <div class="caja-info">

                <form action="../Database/InsertarUsuario.php" method="post">
                    
                    <div class="field-group">
                        <label for="nombre"><b>Nombre de usuario</b></label>
                        <input type="text" id="nombre" name="nombre" class="text-box-name-user" placeholder="Nombre de usuario" required>
                    </div>

                    <div class="field-group">
                        <label for="password-input"><b>Contraseña</b></label>
                        <div class="password-wrapper">
                            <input id="password-input" type="password" name="contraseña" class="text-box-password" placeholder="Contraseña" required>
                            <button id="view-password" type="button" class="password-button" onclick="view()">X</button>
                        </div>
                    </div>

                    <div class="field-group">
                        <label for="repeat-password-input"><b>Repetir contraseña</b></label>
                        <div class="password-wrapper">
                            <input id="repeat-password-input" type="password" name="contraseñaRep" class="text-box-repeat-password" placeholder="Repetir contraseña" required>
                            <button id="view-repeat-password" type="button" class="repeat-password-button" onclick="repeat()">X</button>
                        </div>
                    </div>

                    <div class="field-group">
                        <label for="correo"><b>Correo electrónico</b></label>
                        <input type="email" id="correo" name="correo" class="text-box-mail" placeholder="Correo electrónico" required>
                    </div>

                    <input type="submit" value="Registrarse" name="registrar" class="make">

                </form>

                <?php
                if (isset($_SESSION["error"]) && !empty($_SESSION["error"])) {
                    echo '<div class="error-message">' . htmlspecialchars($_SESSION["error"]) . '</div>';
                    $_SESSION["error"] = "";
                }
                ?>

            </div>

        </div>

    </div>

    <script src="../JS/register.js"></script>
</body>

</html>