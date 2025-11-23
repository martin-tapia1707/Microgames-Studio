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
    <div class="contenido-game">
        <section class="profile-content">
            <div class="perfil-cabecera">
                <img class="profile-avatar"
                    src='<?php echo $_SESSION["perfil"]?>'>
                <div class="profile-info">
                    <p class="user-name"><?php echo $_SESSION['usuario']; ?></p>
                    <p class="user-rol"><?php echo $_SESSION['rol']; ?></p>
                    <p class="user-date">unido desde ##/##/##</p>
                </div>
            </div>

             <!-- Cambiar datos, da a la siguiente pagina-->
            <div class="edit-profile">
                <a href="edit.php" class="edit-profile-link">Editar perfil</a>
            </div>

            <div class="perfil-detalles">
                <div class="user-desc">
                    <h2 class="about-me">Sobre mí:</h2>
                    <p class="desc"><?php echo $_SESSION["descripcion"];?></p>
                </div>
                <!-- Historial del usuario -->
            </div>
            <div class="profile-history">
                <h2 class="your-register">Juegos que me gustan</h2>
            <div class="void-list">
                <h2 class="tuto-list">Está es la lista de tus juegos favoritos</h2>
                <p  class="how-list">Solo dale me gusta a cualquier juego que te guste.. ¡y aparecerá acá!</p>
            </div>

            </div>
            <div class="log-out">
            <a href="../Database/Controlador_CerrarLogin.php" class="log-out-link" >Cerrar sesion</a>
            </div>




        </section>
    </div>


</body>

</html>