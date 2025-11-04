<?php
 include "../Includes/Config.php";
header('Content-Type: application/json; charset=utf-8');

$json_input = file_get_contents('php://input');
$datos = json_decode($json_input, true);

if ($datos && json_last_error() === JSON_ERROR_NONE) {
    $cantidadLike = $datos['cantidadLike'] ?? null;
    $juegoID = $datos['juegoID'] ?? null;
    $usuarioID = $datos['usuarioID'] ?? null;
    $cantidadDislike = $datos['cantidadDislike'] ?? null;

    // Aquí procesarías la actualización en la base de datos...



    $verificacionPulgar = mysqli_query($conexion, "SELECT * FROM informacion WHERE IDjuego = '$juegoID' AND IDusuario = '$usuarioID'");
    $filas = mysqli_num_rows($verificacionPulgar);
    $valores = mysqli_fetch_array($verificacionPulgar);
    $valorPulgar = $valores['Pulgar'];
    if($filas == 1){
            if($valorPulgar == 1){
                $lqs = ("UPDATE informacion SET Pulgar = NULL WHERE IDjuego = '$juegoID' AND IDusuario = '$usuarioID'");
                mysqli_query($conexion, $lqs);
                $cantidadLike += 0;
            }elseif($valorPulgar == 0){
                $lqs = ("UPDATE informacion SET Pulgar = 1 WHERE IDjuego = '$juegoID' AND IDusuario = '$usuarioID'");
                mysqli_query($conexion, $lqs);
                $cantidadLike += 1;
            }elseif(is_null($valorPulgar)){
                $lqs = ("UPDATE informacion SET Pulgar = 1 WHERE IDjuego = '$juegoID' AND IDusuario = '$usuarioID'");
                mysqli_query($conexion, $lqs);
                $cantidadLike += 1;
            }
            
    }elseif($filas < 1){
        $qls = ("INSERT INTO informacion(IDusuario, IDjuego, Pulgar) VALUES ('$usuarioID','$juegoID', 1)" ); 
        mysqli_query($conexion, $qls);
        $cantidadLike += 1;
    }


    $actualizacion = ("UPDATE juegos SET siLike = '$cantidadLike', noLike = '$cantidadDislike' WHERE IDjuego = '$juegoID'");
    mysqli_query($conexion, $actualizacion);

    
    $miArray = ["likeCantidad" => $cantidadLike, "dislikeCantidad" => $cantidadDislike];
    echo json_encode($miArray);
} else {
    http_response_code(400);
    echo json_encode(["error" => "no se recibieron datos JSON válidos"]);
}
?>