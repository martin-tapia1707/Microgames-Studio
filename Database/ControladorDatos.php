<?php

    session_start();
    include "../Includes/Config.php";

    if(!empty($_POST["Guardar"])){
        if((!empty($_POST["nuevoNombre"])) && (!empty($_POST["nuevoCorreo"]))){
            $id = $_SESSION["id"];
            $nombreV = $_SESSION["usuario"];
            $nombreN = $_POST["nuevoNombre"];
            $correoN = $_POST["nuevoCorreo"];
            $contraseñaV = $_SESSION["password"];
            $contraseñaN = $_POST["nuevaContraseña"];
            $contraseñaR = $_POST["nuevaContraseñaR"];
            $descripcionN = $_POST["nuevaDescripcion"];
            if($contraseñaN == "Contraseña"){
                $contraseñaN = $contraseñaV;
<<<<<<< HEAD
            }if($contraseñaR==""){
=======
            }if(($contraseñaR=="Repetir contraseña")&&($contraseñaN=="Contraseña")){
>>>>>>> 7010f75e981c3b041f98a620fd1afbef0e88d3c8
                    $contraseñaR=$contraseñaN;
            }if($contraseñaN!=$contraseñaR){
                echo "las contraseñas no coinciden";
            }else{
            
            $sql = ("UPDATE usuario SET Nombre = '$nombreN', Correo = '$correoN', Contraseña = '$contraseñaN', Descripcion = '$descripcionN'  WHERE IDusuario = '$id';");
            mysqli_query($conexion, $sql);
            $lqs = $conexion->query("SELECT * FROM usuario WHERE IDusuario = '$id'");
            if($datos=$lqs->fetch_object()){
                $_SESSION["id"]=$datos->IDusuario;
                $_SESSION["usuario"]=$datos->Nombre;
                $_SESSION["email"]=$datos->Correo;
                $_SESSION["perfil"]=$datos->Foto; 
                $_SESSION["password"]=$datos->Contraseña;
                $_SESSION["descripcion"]=$datos->Descripcion;
                header("location: ../Views/account.php ");
            }else{
                echo "<div>Accesso denegado</div>";
            }
            }
        }else{
        echo "campos vacios";
        }
    }

?>