<?php
  require_once '../Includes/Config.php';

if (isset($_GET['id'])) {
    $idJuego = $_GET['id'];
    echo "<script>console.log('$idJuego')</script>";


    $query = "SELECT * FROM juegos WHERE IDjuego = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $idJuego);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($row = $resultado->fetch_assoc()) {
        $nombre = $row['Nombre'];
        $comoJugar = $row['ComoJugar'];
        $queHacer = $row['QueHacer'];
        $direccion = $row['direccion'];
        $like = $row['siLike'];
        $dislike = $row['noLike'];
    } else {
        // Si no existe el ID
        $nombre = "Juego no encontrado";
        $comoJugar = $queHacer = "No hay información disponible.";
    }
}

?>


<div class="contenedorJuego">
  <h1><?= htmlspecialchars($nombre) ?></h1>
  <div class="screen"><iframe src="<?= $direccion ?>" height="480px" width= "100%"></iframe></div>

  <div class="acciones">
    <span class="count" id="likes"><?= $like ?></span>
    <button class="like" onclick="aumentar()"><i class='bx bxs-like'></i></button>
    <button class="dislike"><i class='bx bxs-dislike'></i></button>
    <span class="count" id="likes"><?= $dislike ?></span>
  </div>
</div>

<div class="contenedorTutorial">
  <h1>¿Como jugar?</h1>
  <p><?= nl2br(htmlspecialchars($comoJugar)) ?></p>

  <h1>¿Qué hacer?</h1>
  <p><?= nl2br(htmlspecialchars($queHacer)) ?></p>
</div>

<div class="apartadoComentarios">
  <h1 class="titulocomentarios">Comentarios</h1>

  <textarea class="comentar" id="textoComentario" placeholder="Escribe un comentario"></textarea><br>
  <button class="publicar" id="publicacion">Publicar</button>
  <button class="publicar" id="descartacion">Descartar</button>

  <!-- Aca se van a insertar los nuevos comentarios -->
  <div id="listaComentarios"></div>
</div>

<script src="../JS/selectedgame.js"></script>

