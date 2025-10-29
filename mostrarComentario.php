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

    // Salida HTML directa (puede ser JSON si preferís)
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
            <div class='cuadroComentario'>
                <img src='{$row['Foto']}' class='fotoPerfil'>
                <div class='contenidoComentario'>
                    <strong>{$row['Nombre']} ({$row['rol']})</strong><br>
                    <p>{$row['texto']}</p>
                    <small>{$row['fecha']}</small>
                </div>
            </div>";
        }
    } else {
        echo "<p class='sinComentarios'>No hay comentarios todavía.</p>";
    }
}
?>