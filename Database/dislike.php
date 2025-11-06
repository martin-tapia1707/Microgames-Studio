<?php
 include "../Includes/Config.php";
header('Content-Type: application/json; charset=utf-8');

$json_input = file_get_contents('php://input');
$datos2 = json_decode($json_input, true);

if ($datos2 && json_last_error() === JSON_ERROR_NONE) {
    $juegoID = $datos2['juegoID'] ?? null;
    $usuarioID = $datos2['usuarioID'] ?? null;
    $consulta = mysqli_query($conexion, "SELECT * FROM juegos WHERE IDjuego = '$juegoID'");
    $likes = mysqli_fetch_array($consulta);
    $cantidadLike = $likes['siLike'];
    $cantidadDislike = $likes['noLike'];

    // Aquí procesarías la actualización en la base de datos...



    $verificacionPulgar = mysqli_query($conexion, "SELECT * FROM informacion WHERE IDjuego = '$juegoID' AND IDusuario = '$usuarioID'");
    $filas = mysqli_num_rows($verificacionPulgar);
    if($filas == 1){
        $valores = mysqli_fetch_array($verificacionPulgar);
        $valorPulgar = $valores['Pulgar'];
            if(is_null($valorPulgar)){
                $lqs = ("UPDATE informacion SET Pulgar = 0 WHERE IDjuego = '$juegoID' AND IDusuario = '$usuarioID'");
                mysqli_query($conexion, $lqs);
                $cantidadDislike += 1;
                $actualizacionDislike = ("UPDATE juegos SET noLike = '$cantidadDislike' WHERE IDjuego = '$juegoID'");
                mysqli_query($conexion, $actualizacionDislike);
            }elseif($valorPulgar == 1){
                $lqs = ("UPDATE informacion SET Pulgar = 0 WHERE IDjuego = '$juegoID' AND IDusuario = '$usuarioID'");
                mysqli_query($conexion, $lqs);
                $cantidadDislike += 1;
                $cantidadLike += -1;
                $actualizacionDislike = ("UPDATE juegos SET noLike = '$cantidadDislike', siLike = '$cantidadLike'  WHERE IDjuego = '$juegoID'");
                mysqli_query($conexion, $actualizacionDislike);
            }elseif($valorPulgar == 0){
                $lqs = ("UPDATE informacion SET Pulgar = NULL WHERE IDjuego = '$juegoID' AND IDusuario = '$usuarioID'");
                mysqli_query($conexion, $lqs);
                $cantidadDislike += -1;
                $actualizacionDislike = ("UPDATE juegos SET noLike = '$cantidadDislike' WHERE IDjuego = '$juegoID'");
                mysqli_query($conexion, $actualizacionDislike);
            }
            
    }elseif($filas < 1){
        $qls = ("INSERT INTO informacion(IDusuario, IDjuego, Pulgar) VALUES ('$usuarioID','$juegoID', 0)" ); 
        mysqli_query($conexion, $qls);
        $cantidadDislike += 1;
        $actualizacionDislike = ("UPDATE juegos SET noLike = '$cantidadDislike'  WHERE IDjuego = '$juegoID'");
        mysqli_query($conexion, $actualizacionDislike);
    }

    $miArray = ["dislikeCantidad" => $cantidadDislike, "cantidadLike" => $cantidadLike];
    echo json_encode($miArray);
} else {
    http_response_code(400);
    echo json_encode(["error" => "no se recibieron datos JSON válidos"]);
}
?>