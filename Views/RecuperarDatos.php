<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Microgames Studio</title>
    <link rel="stylesheet" href="../CSS/RecuperarDatos.css">
        <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/sidebar.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../IMG/LogoEmpresa.png" />
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
</head>

<body>
<?php
    require_once "header.php";
    require_once "sidebar.php";
?>


    <div class="header-info">

        <img class="logo" src="../IMG/Logo_texto.png">

        <div class="content">

            <h1 class="text-account-recovery"><b>Recuperación de la cuenta</b></h1>

            <div class="caja-info">

                <form method="post" action="../Database/EnviarDatos.php" enctype="multipart/form-data">
                    <p class="mail"><b>Correo electronico</b></p><input class="text-box-account-recovery" type="email"
                    placeholder="Ingresa correo electronico" name="CorreoE">
                    <input type="submit" value="Recuperar" name="Recuperar" class="recover">
                </form>
            </div>
        </div>

    </div>

</body>

</html>