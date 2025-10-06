<?php
require_once __DIR__ . '../Includes/config.php';
session_start();

header('Content-Type: application/json');

// Verificar si el usuario está logueado
if (!isset($_SESSION['IDusuario'])) {
    echo json_encode(["status" => "error", "msg" => "Usuario no logueado"]);
    exit;
}

// Verificar si llega el texto
if (!isset($_POST['texto']) || trim($_POST['texto']) === '') {
    echo json_encode(["status" => "error", "msg" => "El comentario está vacío"]);
    exit;
}

$idUsuario = $_SESSION['IDusuario'];
$texto = trim($_POST['texto']);
$fecha = date("Y-m-d"); 

try {
    $sql = "INSERT INTO comentario (texto, fecha, valorLike, IDusuario) VALUES (?, ?, NULL, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $texto, $fecha, $idUsuario);
    $stmt->execute();

    $sqlUsuario = "SELECT Nombre FROM usuario WHERE IDusuario = ?";
    $stmtUser = $conn->prepare($sqlUsuario);
    $stmtUser->bind_param("i", $idUsuario);
    $stmtUser->execute();
    $resultado = $stmtUser->get_result()->fetch_assoc();

    echo json_encode([
        "status" => "ok",
        "usuario" => $resultado['Nombre'],
        "texto" => htmlspecialchars($texto),
        "fecha" => $fecha
    ]);

} catch (Exception $e) {
    echo json_encode(["status" => "error", "msg" => "Error: " . $e->getMessage()]);
}