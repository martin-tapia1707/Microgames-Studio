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


    if ($row = $resultado->fetch_assoc()) { // llama a los datos
        $nombre = $row['Nombre'];
        $comoJugar = $row['ComoJugar'];
        $queHacer = $row['QueHacer'];
        $direccion = $row['direccion']; // llama al juego y lo guarda en variable $direccion
        $like = $row['siLike'];
        $dislike = $row['noLike'];
        $controles = $row['Controles'];
        $creador = $row['Creador'];
        $linkPagina = $row['Pagina'];
        $id = $_SESSION['id'] ?? null; // saca el id del juego
    } else {
        // Si no existe el ID
        $nombre = "Juego no encontrado";
        $comoJugar = $queHacer = "No hay información disponible.";
    }
}
?>

<div class="contenedorJuego">
  <h1><?= htmlspecialchars($nombre) ?></h1>
  <div class="screen"><iframe src="<?= $direccion ?>" height="480px" width= "100%"></iframe></div> <!-- dependiendo el id juego, pone cierto juego -->

  <?php if ($id): ?>
    <div class="acciones">
    <span class="count" id="likes"><?= $like ?></span>
    <button class="like" onclick="aumentar(<?= $idJuego ?>, <?= $id ?>)"><i class='bx bxs-like'></i></button>
    <button class="dislike" onclick="disminuir(<?= $idJuego ?>, <?= $id ?>)"><i class='bx bxs-dislike'></i></button>
    <span class="count" id="dislike"><?= $dislike ?></span>
  </div>
  <?php endif; ?>
  <?php if (is_null($id)): ?>
  <div class="acciones">
    <span class="count" id="likes"><?= $like ?></span>
    <button class="like" onclick="nosesion()"><i class='bx bxs-like'></i></button>
    <button class="dislike" onclick="nosesion()"><i class='bx bxs-dislike'></i></button>
    <span class="count" id="dislike"><?= $dislike ?></span>
  </div>
  <?php endif; ?>

  <!-- PUBLICIDAD -->

    <div class="publicidad">
      <img id="anuncio" src="" alt="Publicidad lateral">
    </div>
</div> 



<!-- JS con publicidad random -->

<script>
const imagenes = [
  "../IMG/publicidad.webp",
  "../IMG/publicidad2.webp",
  "../IMG/publicidad3.png",
  "../IMG/publicidad4.jpg",
  "../IMG/publicidad5.png",
] // array publicidades posibles

const publicidadRandom = Math.floor(Math.random() * imagenes.length); // hace el random

const publicidadSeleccionada = imagenes[publicidadRandom]; // selecciona imagen random

document.getElementById("anuncio").src = publicidadSeleccionada; // muestra la publicidad seleccionada
</script>

<!-- descripcion de los juegos -->

<div class="contenedorTutorial">
  <h1>¿Como jugar?</h1>
  <p><?= nl2br(htmlspecialchars($comoJugar)) ?></p> 


  <h1>¿Qué hacer?</h1>
  <p><?= nl2br(htmlspecialchars($queHacer)) ?></p>

  <h1>Creditos</h1>
  <p> Autor: <?= nl2br(htmlspecialchars($creador)) ?></p>
  <p>Link del Juego: <a href="<?= nl2br(htmlspecialchars($linkPagina)) ?>"><?= nl2br(htmlspecialchars($linkPagina))?></a></p>
</div>


<div class="apartadoComentarios">
  <h1 class="titulocomentarios">Comentarios</h1>


  <textarea class="comentar" id="texto" placeholder="Escribe un comentario"></textarea><br>
  <button class="publicar" id="publicacion">Publicar</button>
  <button class="publicar" id="descartacion">Descartar</button>


  <!-- Aca se van a insertar los nuevos comentarios -->
  <div id="listaComentarios"></div>
</div>


<script src="../JS/selectedgame.js"></script>