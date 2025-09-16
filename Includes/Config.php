<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "rodentgames";  

    $conexion = mysqli_connect($server, $user, $password, $db);

    // if(!$conexion){
    //     echo json_encode([
    //         "error" => mysqli_connect_error(), 
    //         "errno" => mysqli_connect_errno(),
    //     ]); 
    //     exit;
    // }

    if($conexion){
        echo "estas conectado";
    }else{
        echo "ahora que paso";
    }

?>