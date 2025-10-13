<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Microgames Studio</title>
    <link rel="stylesheet" href="../CSS/account.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../IMG/LogoEmpresa.png" />
    <link rel="stylesheet" href="../CSS/account.css">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/sidebar.css">


<body>
<?php
    require_once "header.php";
    require_once "sidebar.php";
?>

    <!-- Contenido principal, avatar y descripcion sobre el -->
    <div class="contenido">
        <section class="profile-content">
            <div class="perfil-cabecera">
                <img class="profile-avatar"
                    src='<?php echo $_SESSION["perfil"]?>'>
                <div class="profile-info">
                    <p class="user-name"><?php echo $_SESSION['usuario']; ?></p>
                    <p class="user-mail"><?php echo $_SESSION['email']; ?></p>
                </div>
            </div>
            <div class="perfil-detalles">
                <div class="user-desc">
                    <h2 class="about-me">Sobre mí:</h2>
                    <p class="desc"><?php echo $_SESSION["descripcion"];?></p>
                </div>
                <!-- Historial del usuario -->
            </div>
            <div class="profile-history">
                <h2 class="your-register">Registro:</h2>
                <div class="first-game-info">
                    <p class="game-title">Juego 1:</p>
                    <p class="info-game">PuntuajeMax: </p>
                    <p class="info-game">Horas activo: </p>
                </div>
                <div class="second-game-info">
                    <p class="game-title">Juego 2:</p>
                    <p class="info-game">PuntuajeMax: </p>
                    <p class="info-game">Horas activo: </p>
                </div>
                <div class="third-game-info">
                    <p class="game-title">Juego 3:</p>
                    <p class="info-game">PuntuajeMax: </p>
                    <p class="info-game">Horas activo: </p>
                </div>
                <a href="../Database/Controlador_CerrarLogin.php" ><button class="log-out-button" ><strong>Cerrar sesion</strong></button></a>

            </div>

            <!-- Cambiar datos, da a la siguiente pagina-->

            <div class="changes-info">

                <a href="edit.php"><button class="edit-profile-button" ><strong>Editar perfil</strong></button></a>

            </div>



        </section>
    </div>


</body>

</html>