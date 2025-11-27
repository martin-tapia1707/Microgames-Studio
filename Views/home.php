<!-- Juegos populares / destacados -->



<div class="JuegosPopulares">
  <div class="contenedorPopulares">
  <h1 class="title-popular-games">Juegos populares</h1>

    <div class="content carrusel">
      
       <button class="btn-carrusel prev">❮</button>
      <a href="Mainsite.php?section=selectedgame&id=5">
        <div class="juego" style="background-image: url('../IMG/IconoJuego.jpg');"></div>
      </a>
      <a href="Mainsite.php?section=selectedgame&id=2">
        <div class="juego" style="background-image: url('../IMG/JuegoRandom.webp');"></div>
      </a>
      <a href="Mainsite.php?section=selectedgame&id=3">
        <div class="juego" style="background-image: url('../IMG/JuegoRandom2.webp');"></div>
      </a>
    </div>

    <button class="btn-carrusel next">❯</button>
    <script src="../JS/Inicio.js"></script>
  </div>
</div>

<!-- catalogo dividido en categorias -->
<div class="JuegosCatalogo">
  <h1 class="title-action-games">Juegos casuales</h1>
  <div class="contenedorCatalogo">
    <a href="Mainsite.php?section=selectedgame&id=11">
 <?php

  include "../Includes/Config.php"; 

  $infoJuegos = mysqli_query($conexion, "SELECT * FROM juegos");

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
  </div>
</div>
