<?php
require_once "Conexion.php";


if(!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "INSERT INTO usuario(Nombre, correo, contraseña) VALUES ('$username', '$email', '$password')";
    if(mysqli_query($conexion, $sql)) {
        echo json_encode(["msj" => "Todo bien"]);
    } else {
        echo json_encode(["error" => "Fallo la consulta","msj" => "No se pudo agregar el director"]);
    }
} else {
    echo json_encode(["error" => "No se recibieron parametros", "msj" => "Envia el username de algun director"]);
}
?>