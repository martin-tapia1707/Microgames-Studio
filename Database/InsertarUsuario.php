<?php

    include("../Includes/Config.php");

    session_start();
    

    if(!empty($_POST["registrar"])){
        $nombre = $_POST["nombre"];
        $contraseña = $_POST["contraseña"];
        $contraseñaRep = $_POST["contraseñaRep"];
        $correo = $_POST["correo"];

        if($contraseña == $contraseñaRep){
            if(empty($nombre)){
                $_SESSION["error"] = "<p style='text-indent: 10px;'>ingrese un nombre</p>";
                header("location: ../Views/Mainsite.php?section=register");
            }elseif(empty($contraseña)){
                $_SESSION["error"] = "<p style='text-indent: 10px;'>ingrese una contraseña</p>";
                header("location: ../Views/Mainsite.php?section=register");
            }elseif(empty($correo)){
                $_SESSION["error"] = "<p style='text-indent: 10px;'>ingrese un correo</p>";
                header("location: ../Views/Mainsite.php?section=register");
            }else{
                $verificacion = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE Nombre = '$nombre' OR Correo = '$correo'");
                $filas = mysqli_num_rows($verificacion);
                if($filas > 0){
                    $repetido = mysqli_fetch_array($verificacion);
                    $nombreRepetido = $repetido["Nombre"];
                    $correoRepetido = $repetido["Correo"];
                    if($nombreRepetido == $nombre){
                        $_SESSION["error"] = "<p style='text-indent: 10px;'>El usuario ya existe</p>";
                        header("location: ../Views/Mainsite.php?section=register");
                    }elseif($correoRepetido == $correo){
                        $_SESSION["error"] = "<p style='text-indent: 10px;'>El correo ya existe</p>";
                        header("location: ../Views/Mainsite.php?section=register");
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
                    $_SESSION["idrol"]=$datos->IDrol;
                    $_SESSION["error"] = "";
                    header("location: ../Views/Mainsite.php?section=home");
                }
                }
            }
        }elseif($contraseña != $contraseñaRep){
            $_SESSION["error"] = "<p style='text-indent: 10px;'>Las contraseñas no coinciden</p>";
            header("location: ../Views/Mainsite.php?section=register");
        }
    }
    mysqli_close($conexion);
?>