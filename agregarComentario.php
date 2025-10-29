<?php
include "Includes/Config.php"; 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['texto'])) {
    $texto = $_POST['texto'];
    $fecha = date('Y-m-d');

    if (!isset($_SESSION['id'])) {
        echo json_encode(["status" => "error", "mensaje" => "No hay usuario logueado"]);
        exit;
    }

    $IDusuario = $_SESSION['id'];

    // Insertar comentario
    $sql = "INSERT INTO comentario (texto, fecha, IDusuario) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssi", $texto, $fecha, $IDusuario);
        $stmt->execute();

        $nuevoID = $stmt->insert_id;

        if (isset($_POST['IDjuego'])) {
            $IDjuego = intval($_POST['IDjuego']);
            $sql2 = "INSERT INTO opiniones (IDcomentario, IDjuego) VALUES (?, ?)";
            $stmt2 = $conexion->prepare($sql2);
            $stmt2->bind_param("ii", $nuevoID, $IDjuego);
            $stmt2->execute();
        }

        echo json_encode(["status" => "ok", "mensaje" => "Comentario publicado"]);
    } else {
        echo json_encode(["status" => "error", "mensaje" => $conexion->error]);
    }
}
?>