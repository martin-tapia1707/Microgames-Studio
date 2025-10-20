<?php

    include("../Includes/Config.php");
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }

    if(!empty($_POST["registrar"])){
        $nombre = $_POST["nombre"];
        $contraseña = $_POST["contraseña"];
        $contraseñaRep = $_POST["contraseñaRep"];
        $correo = $_POST["correo"];

        if($contraseña == $contraseñaRep){
            if(empty($nombre)){
                echo "<p style='text-indent: 10px;'>ingrese un nombre</p>";
            }elseif(empty($contraseña)){
                echo "<p style='text-indent: 10px;'>ingrese una contraseña</p>";
            }elseif(empty($correo)){
                echo "<p style='text-indent: 10px;'>ingrese un correo</p>";
            }else{
                $verificacion = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE Nombre = '$nombre' OR Correo = '$correo'");
                $filas = mysqli_num_rows($verificacion);
                if($filas > 0){
                    $repetido = mysqli_fetch_array($verificacion);
                    $nombreRepetido = $repetido["Nombre"];
                    $correoRepetido = $repetido["Correo"];
                    if($nombreRepetido == $nombre){
                        echo "<p style='text-indent: 10px;'>El usuario ya existe</p>";
                    }elseif($correoRepetido == $correo){
                        echo "<p style='text-indent: 10px;'>El correo ya existe</p>";
                    }
                }else{
                $sql = "INSERT INTO usuario(Nombre, Correo, Contraseña) 
                        VALUES ('$nombre', '$correo', '$contraseña')";
                mysqli_query($conexion, $sql);
                $lqs = $conexion->query("SELECT * FROM usuario u INNER JOIN roles r ON u.IDrol = r.IDrol WHERE Nombre = '$nombre' AND Contraseña = '$contraseña'");
                if($datos=$lqs->fetch_object()){
                    $_SESSION["id"]=$datos->IDusuario;
                    $_SESSION["usuario"]=$datos->Nombre;
                    $_SESSION["email"]=$datos->Correo;
                    $_SESSION["perfil"]=$datos->Foto; 
                    $_SESSION["password"]=$datos->Contraseña;
                    $_SESSION["descripcion"]=$datos->Descripcion;
                    $_SESSION["rol"]=$datos->rol;
                    header("location: ../Views/Mainsite.php?section=home");
                    exit;
                }
                }
            }
        }elseif($contraseña != $contraseñaRep){
            echo "<p style='text-indent: 10px;'>Las contraseñas no coinciden</p>";
        }
    }
    mysqli_close($conexion);
?>