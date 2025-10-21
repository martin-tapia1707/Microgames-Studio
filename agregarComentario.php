<?php

// // Crear usuario
// if (isset($_POST['crear'])) {
//     $nombre = $_POST['Nombre'];
//     $correo = $_POST['Correo'];
//     $descripcion = $_POST['Descripcion'];
//     $idrol = $_POST['IDrol'];
//     $contraseña = $_POST['Contraseña'];

//     // Guardar foto
//     $foto = "../IMGU/defaulPerfil.jpg";
//     if (!empty($_FILES['Foto']['name'])) {
//         $nombreFoto = time() . "_" . $_FILES['Foto']['name'];
//         $rutaDestino = "../IMGU/" . $nombreFoto;
//         move_uploaded_file($_FILES['Foto']['tmp_name'], $rutaDestino);
//         $foto = $rutaDestino;
//     }

//     $sql = "INSERT INTO usuario (Nombre, Correo, Foto, Contraseña, Descripcion, IDrol)
//             VALUES (?, ?, ?, ?, ?, ?)";
//     $stmt = $conexion->prepare($sql);
//     $stmt->bind_param("sssssi", $nombre, $correo, $foto, $contraseña, $descripcion, $idrol);
//     $stmt->execute();
//     header("Location: crud.php");
//     exit();
// }


?>