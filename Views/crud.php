<?php
require_once '../Includes/Config.php';

// Crear usuario
if (isset($_POST['crear'])) {
    $nombre = $_POST['Nombre'];
    $correo = $_POST['Correo'];
    $descripcion = $_POST['Descripcion'];
    $idrol = $_POST['IDrol'];
    $contraseña = $_POST['Contraseña'];

    // Guardar foto
    $foto = "../IMGU/defaulPerfil.jpg";
    if (!empty($_FILES['Foto']['name'])) {
        $nombreFoto = time() . "_" . $_FILES['Foto']['name'];
        $rutaDestino = "../IMGU/" . $nombreFoto;
        move_uploaded_file($_FILES['Foto']['tmp_name'], $rutaDestino);
        $foto = $rutaDestino;
    }

    $sql = "INSERT INTO usuario (Nombre, Correo, Foto, Contraseña, Descripcion, IDrol)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssi", $nombre, $correo, $foto, $contraseña, $descripcion, $idrol);
    $stmt->execute();
    header("Location: crud.php");
    exit();
}

// Borrar usuario
if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    $sql = "DELETE FROM usuario WHERE IDusuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: crud.php");
    exit();
}

// Actualizar usuario
if (isset($_POST['actualizar'])) {
    $id = $_POST['IDusuario'];
    $nombre = $_POST['Nombre'];
    $correo = $_POST['Correo'];
    $descripcion = $_POST['Descripcion'];
    $idrol = $_POST['IDrol'];
    $contraseña = $_POST['Contraseña'];

    // Manejo de la foto
    if (!empty($_FILES['Foto']['name'])) {
        $nombreFoto = time() . "_" . $_FILES['Foto']['name'];
        $rutaDestino = "../IMGU/" . $nombreFoto;
        move_uploaded_file($_FILES['Foto']['tmp_name'], $rutaDestino);
        $foto = $rutaDestino;
        $sql = "UPDATE usuario SET Nombre=?, Correo=?, Foto=?, Contraseña=?, Descripcion=?, IDrol=? WHERE IDusuario=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssssssi", $nombre, $correo, $foto, $contraseña, $descripcion, $idrol, $id);
    } else {
        $sql = "UPDATE usuario SET Nombre=?, Correo=?, Contraseña=?, Descripcion=?, IDrol=? WHERE IDusuario=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssssii", $nombre, $correo, $contraseña, $descripcion, $idrol, $id);
    }
    $stmt->execute();
    header("Location: crud.php");
    exit();
}

// Leer usuarios (solo rol 1 o 3)
$query = "SELECT u.*, r.rol FROM usuario u
          INNER JOIN roles r ON u.IDrol = r.IDrol
          WHERE u.IDrol IN (1, 3)";
$resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h1 class="text-center mb-4">Gestión de Usuarios (CRUD)</h1>

    <!-- FORMULARIO CREAR -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Crear nuevo usuario</div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="row mb-2">
                    <div class="col"><input type="text" name="Nombre" class="form-control" placeholder="Nombre" required></div>
                    <div class="col"><input type="email" name="Correo" class="form-control" placeholder="Correo" required></div>
                </div>
                <div class="row mb-2">
                    <div class="col"><input type="password" name="Contraseña" class="form-control" placeholder="Contraseña" required></div>
                    <div class="col"><input type="text" name="Descripcion" class="form-control" placeholder="Descripción"></div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <select name="IDrol" class="form-select" required>
                            <option value="1">Moderador</option>
                            <option value="2">Product Owner</option>
                            <option value="3">Miembro</option>
                        </select>
                    </div>
                    <div class="col"><input type="file" name="Foto" class="form-control"></div>
                </div>
                <button type="submit" name="crear" class="btn btn-success">Crear usuario</button>
            </form>
        </div>
    </div>

    <!-- LISTADO -->
    <div class="card">
        <div class="card-header bg-dark text-white">Listado de Usuarios</div>
        <div class="card-body">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Descripción</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['IDusuario'] ?></td>
                        <td><img src="<?= $row['Foto'] ?>" width="60" height="60" style="object-fit:cover;border-radius:50%"></td>
                        <td><?= htmlspecialchars($row['Nombre']) ?></td>
                        <td><?= htmlspecialchars($row['Correo']) ?></td>
                        <td><?= htmlspecialchars($row['Descripcion']) ?></td>
                        <td><?= $row['rol'] ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editar<?= $row['IDusuario'] ?>">Editar</button>
                            <a href="?borrar=<?= $row['IDusuario'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres borrar este usuario?')">Borrar</a>
                        </td>
                    </tr>

                    <!-- MODAL EDITAR -->
                    <div class="modal fade" id="editar<?= $row['IDusuario'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title">Editar Usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="IDusuario" value="<?= $row['IDusuario'] ?>">
                                        <input type="text" name="Nombre" class="form-control mb-2" value="<?= htmlspecialchars($row['Nombre']) ?>" required>
                                        <input type="email" name="Correo" class="form-control mb-2" value="<?= htmlspecialchars($row['Correo']) ?>" required>
                                        <input type="password" name="Contraseña" class="form-control mb-2" value="<?= htmlspecialchars($row['Contraseña']) ?>" required>
                                        <textarea name="Descripcion" class="form-control mb-2"><?= htmlspecialchars($row['Descripcion']) ?></textarea>
                                        <select name="IDrol" class="form-select mb-2">
                                            <option value="1" <?= $row['IDrol']==1?'selected':'' ?>>Moderador</option>
                                            <option value="2" <?= $row['IDrol']==2?'selected':'' ?>>Product Owner</option>
                                            <option value="3" <?= $row['IDrol']==3?'selected':'' ?>>Miembro</option>
                                        </select>
                                        <input type="file" name="Foto" class="form-control mb-2">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="actualizar" class="btn btn-primary">Guardar cambios</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
