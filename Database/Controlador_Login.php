<?php

    session_start();

    if(!empty($_POST["Login"])){
        if((!empty($_POST["nombreL"])) && (!empty($_POST["contraseñaL"]))){
            $nombre = $_POST["nombreL"];
            $contraseña = $_POST["contraseñaL"];
            $sql = $conexion->query("SELECT * FROM usuario WHERE Nombre = '$nombre' AND Contraseña = '$contraseña'");
            if($datos=$sql->fetch_object()){
                $_SESSION["id"]=$datos->IDusuario;
                $_SESSION["usuario"]=$datos->Nombre;
                $_SESSION["email"]=$datos->Correo;
                $_SESSION["perfil"]=$datos->Foto; 
                $_SESSION["password"]=$datos->Contraseña;
                header("location: ../Views/Mainsite.php");
            }else{
                echo "<div>Accesso denegado</div>";
            }
        }else{
        echo "campos vacios";
        }
    }

?>