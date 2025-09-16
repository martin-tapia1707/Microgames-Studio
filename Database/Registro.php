<?php
    include("C:/xampp/htdocs/Microgames-Studio/Includes/Config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <label>Nombre:</label><br>
        <input type="text" name="nombre"><br>
        <label>Contraseña:</label><br>
        <input type="password" name="contraseña"><br>
        <label>Repetir contraseña:</label><br>
        <input type="password" name="contraseñaRep"><br>
        <label>Mail</label><br>
        <input type="email" name="correo"><br>
        <input type="submit" value="registrar" nombre="registrar">
    </form>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $contraseña = $_POST["contraseña"];
        $contraseñaRep = $_POST["contraseñaRep"];
        $correo = $_POST["correo"];

        if($contraseña == $contraseñaRep){
            if(empty($nombre)){
                echo "ingrese un nombre";
            }elseif(empty($contraseña)){
                echo "ingrese una contraseña";
            }elseif(empty($correo)){
                echo "ingrese un correo";
            }else{
                $sql = "INSERT INTO usuario(Nombre, Correo, Contraseña) 
                        VALUES ('$nombre', '$correo', '$contraseña')";
                mysqli_query($conexion, $sql);
                echo "Te has registrado";
            }
        }elseif($contraseña != $contraseñaRep){
            echo "Las contraseñas no coinciden";
        }
    }
    mysqli_close($conexion);
?>