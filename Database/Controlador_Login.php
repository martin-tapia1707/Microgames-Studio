<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!empty($_POST["Login"])) {
    if (!empty($_POST["nombreL"]) && !empty($_POST["contraseñaL"])) {
        $nombre = $_POST["nombreL"];
        $contraseña = $_POST["contraseñaL"];
        $sql = $conexion->query("SELECT * FROM usuario u INNER JOIN roles r ON u.IDrol = r.Idrol WHERE Nombre = '$nombre' AND Contraseña = '$contraseña'");
        if ($datos = $sql->fetch_object()) {
            $_SESSION["id"] = $datos->IDusuario;
            $_SESSION["usuario"] = $datos->Nombre;
            $_SESSION["email"] = $datos->Correo;
            $_SESSION["perfil"] = $datos->Foto;
            $_SESSION["password"] = $datos->Contraseña;
            $_SESSION["descripcion"] = $datos->Descripcion;
            $_SESSION["rol"] = $datos->rol;
            header("location: ../Views/Mainsite.php");
        } else {
            echo "<br><br><p style='text-indent: 10px;'>Datos incorrectos</p>";
        }
    } else {
        if(empty($_POST["nombreL"])&&empty($_POST["contraseñaL"])){
            echo "<br><br><p style='text-indent: 10px;'>campos vacios</p>";
            exit;
        }
        if (empty($_POST["nombreL"])) {
            echo "<br><br><p style='text-indent: 10px;'>ingrese un nombre</p>";
            exit;
        } elseif (empty($_POST["contraseñaL"])) {
            echo "<br><br><p style='text-indent: 10px;'>ingrese una contraseña</p>";
            exit;
        }
    }
}
