<?php
  include "../Includes/Config.php"; 
?>
<!-- carrusel juegos populares -->

<div class="JuegosPopulares">
  <div class="contenedorPopulares">
    <h1 class="title-popular-games">Juegos populares</h1>

      <div class="content carrusel">

        <button class="btn-carrusel prev">❮</button>
    <?php
      // while para sacar los juegos mas likeados (osea populares)
      $juegosPopulares = mysqli_query($conexion, "SELECT * FROM juegos ORDER BY siLike DESC LIMIT 5");
      while($juego = mysqli_fetch_assoc($juegosPopulares)) {
    ?>
      <a href="Mainsite.php?section=selectedgame&id=<?=$juego['IDjuego']?>">
        <div class="juego" style="background-image: url('<?=$juego['imagen']?>');"></div>
      </a>
      <?php
    } ?>
      </div>
        <button class="btn-carrusel next">❯</button>
    <script src="../JS/Inicio.js"></script>
  </div>
</div>

  <!-- aca un while para mostrar las categorias ?-->

<?php
$categorias = mysqli_query($conexion, "SELECT * FROM categorias ORDER BY nombre ASC"); // guarda categorias

while($categoria = mysqli_fetch_assoc($categorias)) { // while para recorrer todas las categorias

  $idCategoria = $categoria['IDcategoria'];
  $nombreCat = $categoria['nombre']; //mi bombo

?>

<!-- catalogo dividido en categorias -->
<div class="JuegosCatalogo">
  <h1 class="title-action-games">Juegos de <?=$nombreCat?></h1> <!-- html basico -->
  <div class="contenedorCatalogo">
    <a href="Mainsite.php?section=selectedgame&id=11">
 <?php
 // muestra todos los juegos de la categoria
  $infoJuegos = mysqli_query($conexion, "SELECT j.* FROM juegos j 
              JOIN juego_categoria jc ON j.IDjuego = jc.IDjuego
              WHERE jc.IDcategoria = $idCategoria");

        if (mysqli_num_rows($infoJuegos) > 0) { // loss muestra unicamente si hay juegos en esa categoria

while($juego = mysqli_fetch_assoc($infoJuegos)) {
?>
    <a href="Mainsite.php?section=selectedgame&id=<?=$juego['IDjuego']?>">
      <div class="juegoCatalogo">
        <img src="<?=$juego['imagen']?>" alt="<?=$juego['Nombre']?>">
      </div>
    </a>
    <?php
  } ?>
      </div>
    </a>

<?php // en caso de que no hayan juegos! (hola fiscella)
        } else {
          echo "<p style='margin-left:50px;'>No hay juegos en esta categoría.</p>";
        }
?>
    
  </div>
</div>

<?php
}
?>