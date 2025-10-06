<?php
    session_start();
    include "../Includes/Config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cambiar Datos</h1>
    <form method="post" action="../Database/ControladorDatos.php" enctype="multipart/form-data">
        <p><b>usuario:</b></p>
        <input type="text" name="nuevoNombre"  Value="<?php echo $_SESSION["usuario"];?>">
        <p><b>Contraseña:</b></p>
        <div class = "container">
        <input type="password" name="nuevaContraseña" placeholder="contraseña" >
        </div>
        <p><b>Repetir contraseña:</b></p>
        <input type="password" name="nuevaContraseñaR" placeholder="Contraseña">
        <p><b>Correo:</b></p>
        <input type="email" name="nuevoCorreo"  Value="<?php echo $_SESSION["email"];?>"><br>
        <p><b>Descripcion:</b></p>
        <textarea name="nuevaDescripcion"  rows="4" cols="50"><?php echo $_SESSION["descripcion"];?></textarea><br><br>
        <input type="submit" value="Guardar Datos" name="Guardar"><br><br><br>
    </form>

</body>
</html>
