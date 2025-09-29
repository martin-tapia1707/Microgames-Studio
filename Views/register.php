

        
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
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">    <div class="header-info">

        <img class="logo" src="../IMG/logopagina.png">

        <div class="content-register">

        <h1 class="text-register"><b>Registrarse</b></h1>  <a class="sign-up" href="Mainsite.php?section=login"><p>¿Ya tenés una cuenta? ¡¡inicia sesión!!</p></a>

        <div class="caja-info">


        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <br>
            <p class="user"><b>Nombre de usuario</b></p><br>
            <input type="text" name="nombre" class="text-box-name-user" placeholder="Nombre de usuario"><br>
            <p class="password"><b>Contraseña</b></p><br>
            <input type="password" name="contraseña" class="text-box-password"  placeholder="Contraseña"><br>
            <p class="repeat"><b>Repetir contraseña</b></p><br>
            <input type="password" name="contraseñaRep" class="text-box-repeat-password" placeholder="Repetir contraseña"><br>
            <p class="mail"><b>Correo electronico</b></p><br>
            <input type="email" name="correo" class="text-box-mail" type="text" placeholder="Correo electronico"><br>      
            <input type="submit" value="registrarse" nombre="registrar" class="make"><br><br><br><br>
        </form>
    </div>
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
                header("location: Mainsite.php");
            }
        }elseif($contraseña != $contraseñaRep){
            echo "Las contraseñas no coinciden";
        }
    }
    mysqli_close($conexion);
?>