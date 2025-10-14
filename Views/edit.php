<?php
    session_start();
    include "../Includes/Config.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Microgames Studio</title>
    <link rel="stylesheet" href="../CSS/edit.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
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

    <!-- Contenido principal, avatar y descripcion sobre el -->
    <div class="contenido">
        <div class="todo">
            <section class="profile-content">
                <div class="perfil-cabecera">
                    <img class="profile-avatar"
                        src="<?php echo $_SESSION["perfil"]?>">
                    <div class="profile-info">
                        <p class="user-name"><?php echo $_SESSION['usuario']; ?></p>
                        <p class="user-mail"><?php echo $_SESSION['rol']; ?></p>
                    </div>
                </div>
                <div class="perfil-detalles">
                    <div class="user-desc">
                        <h2 class="about-me">Descripción sobre mí:</h2>
                        <p class="desc"><?php echo $_SESSION["descripcion"];?></p>
                    </div>

                    <!-- Cambiar datos -->

                    <div class="changes-info">

                        <form method="post" action="../Database/ControladorDatos.php" enctype="multipart/form-data">

                        <h1 class="title">Cambiar datos</h1>

                        <p class="user"><b>Nombre de usuario</b></p><input class="text-box-name-user" type="text"
                           Value="<?php echo $_SESSION["usuario"];?>"  name="nuevoNombre">

                            <!-- Inputs -->

                        <p class="password"><b>Contraseña</b></p><input id="password-input" class="text-box-password" type="password"
                            placeholder="Contraseña" name="nuevaContraseña" ><button id="view-password" type="button" class="pass-button" onclick="view()">X</button>
                        <p class="repeat-password"><b>Repetir contraseña</b></p><input id="repeat-password-input" class="text-box-repeat-password"
                            type="password" placeholder="Repetir contraseña" name="nuevaContraseñaR"><button id="view-repeat-password" type="button"
                            class="repeat-button" onclick="repeat()">X</button>

                        <p class="mail"><b>Correo electronico</b></p><input class="text-box-mail" type="email"
                            Value="<?php echo $_SESSION["email"];?>" name="nuevoCorreo">

                        <p class="mail"><b>Foto:</b></p><input type="file" name="foto" class="text-box-mail">
                        <p class="description"><b>Descripción</b></p><textarea class="text-box-description" type="text"
                            placeholder="Descripción" name="nuevaDescripcion"><?php echo $_SESSION["descripcion"];?></textarea>


                        <input type="submit" name="Guardar" class="edit-profile-button" value="Actualizar perfil"> 
                        
                        </form>

                    </div>

            </section>
        </div>
    </div>

    <script src="../JS/edit.js"></script>


</body>

</html>