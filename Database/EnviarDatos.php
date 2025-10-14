<?php
    include("../Includes/Config.php");

    $correoIngresado = $_POST["CorreoE"];

    $verificacionCorreo = mysqli_query($conexion, "SELECT * FROM usuario WHERE Correo = '$correoIngresado'");
    $filas = mysqli_num_rows($verificacionCorreo);
    if($filas == 1){
        $datos = mysqli_fetch_array($verificacionCorreo);
        $enviarNombre = $datos["Nombre"];
        $enviarContraseña = $datos["Contraseña"];
        $ParaCorreo = $correoIngresado;
        $titulo = "Envio de datos";
        $mensaje = "Tu usuario es: $enviarNombre\nTu contraseña es: $enviarContraseña";
        $CorreoEmpresa = "From: tapiamartin590@gmail.com" . "\r\n";
        $mail = mail($ParaCorreo, $titulo, $mensaje, $CorreoEmpresa);
        if($mail){
            header("location: ../Views/Mainsite.php?section=login ");
        }else{
            echo "<script>alert('Error')</script>";
        }
    }else{
        header("location: ../Views/RecuperarDatos.php");
    }
    
//     if(isset($_POST["Recuperar"])){
//         if(!empty($_POST["CorreoE"])){
//             $verificacionCorreo = mysqli_query($conexion, "SELECT * FROM usuario WHERE Correo = '$correoIngresado'");
//             $filas = mysqli_num_rows($verificacionCorreo);
//             $datos = mysqli_fetch_array($verificacionCorreo);
//             $enviarNombre = $datos["Nombre"];
//             $enviarContraseña = $datos["Contraseña"];
//             $ParaCorreo = $correoIngresado;
//             $titulo = "envio de datos";
//             $mensaje = "Tu usuario es: " . $enviarNombre . "Tu contraseña es: ". $enviarContraseña;
//             $CorreoEmpresa = "From: tapiamartin590@gmail.com" . "\r\n";
//             @mail($ParaCorreo, $titulo, $mensaje, $CorreoEmpresa)
//         }
//     }
//  ?>