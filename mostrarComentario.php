<?php
include "Includes/Config.php";

if (isset($_GET['IDjuego'])) {
    $IDjuego = intval($_GET['IDjuego']);

    $sql = "
        SELECT c.texto, c.fecha, u.Nombre, u.Foto, r.rol
        FROM comentario c
        JOIN opiniones o ON c.IDcomentario = o.IDcomentario
        JOIN usuario u ON c.IDusuario = u.IDusuario
        JOIN roles r ON u.IDrol = r.IDrol
        WHERE o.IDjuego = ?
        ORDER BY c.IDcomentario DESC
    ";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $IDjuego);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
<div class='cuadroComentario'>
    <img src='{$row['Foto']}' class='fotoPerfil'>
    <div class='contenidoComentario'>
        <div class='cabeceraComentario'>
            <div class='nombreRol'>
                <strong>{$row['Nombre']}</strong>
                <span class='rol'>({$row['rol']})</span>
            </div>
            <span class='fecha'>{$row['fecha']}</span>
        </div>
        <p class='textoComentario'>{$row['texto']}</p>
    </div>
</div>";
        }
    } else {
        echo "<p class='sinComentarios'>Nadie comentó todavia..</p>";
    }
}
?>