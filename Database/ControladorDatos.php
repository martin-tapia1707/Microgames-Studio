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


            if(!empty($foto = $_FILES["foto"])){
            $directorio = "../IMGU";
            $tmp_name = $foto["tmp_name"];
            $img_file = $foto["name"];
            $img_type = $foto["type"];
            if(((strpos($img_file, "gif")||strpos($img_file, "jpeg")||strpos($img_file, "webp")||strpos($img_file, "jpg"))||strpos($img_file, "png"))){
                $destino = $directorio . "/" . $img_file;
                move_uploaded_file($tmp_name, $destino); 
            }
            }else{
                $destino = $_SESSION["perfil"];
            }
            if($contraseñaN == "Contraseña"){
                $contraseñaN = $contraseñaV;
            }if($contraseñaR==""){
            }if(($contraseñaR=="Repetir contraseña")&&($contraseñaN=="Contraseña")){
                    $contraseñaR=$contraseñaN;
            }if($contraseñaN!=$contraseñaR){
                echo "las contraseñas no coinciden";
            }else{
            
            $sql = ("UPDATE usuario SET Nombre = '$nombreN', Correo = '$correoN', Foto = '$destino' , Contraseña = '$contraseñaN', Descripcion = '$descripcionN'  WHERE IDusuario = '$id';");
            mysqli_query($conexion, $sql);
            $lqs = $conexion->query("SELECT * FROM usuario WHERE IDusuario = '$id'");
            if($datos=$lqs->fetch_object()){
                $_SESSION["id"]=$datos->IDusuario;
                $_SESSION["usuario"]=$datos->Nombre;
                $_SESSION["email"]=$datos->Correo;
                $_SESSION["perfil"]=$datos->Foto; 
                $_SESSION["password"]=$datos->Contraseña;
                $_SESSION["descripcion"]=$datos->Descripcion;
                header("location: ../Views/Mainsite.php?section=user ");
            }else{
                echo "<div>Accesso denegado</div>";
            }
            }
        }else{
        echo "campos vacios";
        }
    }

?>