<?php
    session_start();
    include("../Includes/Config.php");

    if(!empty($_POST["registrar"])){
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
                $lqs = $conexion->query("SELECT * FROM usuario u INNER JOIN roles r ON u.IDrol = r.Idrol WHERE Nombre = '$nombre' AND Contraseña = '$contraseña'");
                if($datos=$lqs->fetch_object()){
                    $_SESSION["id"]=$datos->IDusuario;
                    $_SESSION["usuario"]=$datos->Nombre;
                    $_SESSION["email"]=$datos->Correo;
                    $_SESSION["perfil"]=$datos->Foto; 
                    $_SESSION["password"]=$datos->Contraseña;
                    $_SESSION["descripcion"]=$datos->Descripcion;
                    $_SESSION["rol"]=$datos->nombreRol;
                    header("location: ../Views/Mainsite.php");
                    exit;
                }
            }
        }elseif($contraseña != $contraseñaRep){
            echo "Las contraseñas no coinciden";
        }
    }
    mysqli_close($conexion);
?>