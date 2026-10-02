<?php
  include "../Includes/Config.php";

  // escapa texto antes de imprimirlo en el HTML
  if (!function_exists('e')) {
    function e($texto) {
      return htmlspecialchars((string)$texto, ENT_QUOTES, 'UTF-8');
    }
  }

  // los 5 juegos más likeados (el primero va grande)
  $populares = mysqli_fetch_all(
    mysqli_query($conexion, "SELECT IDjuego, Nombre, imagen, siLike FROM juegos ORDER BY siLike DESC LIMIT 5"),
    MYSQLI_ASSOC
  );

  // categorías, una sola vez, para usarlas en los chips y en las secciones
  $categorias = mysqli_fetch_all(
    mysqli_query($conexion, "SELECT IDcategoria, nombre FROM categorias ORDER BY nombre ASC"),
    MYSQLI_ASSOC
  );
?>

<div class="home">

  <?php if ($populares) { ?>
  <section class="destacados" aria-labelledby="titulo-populares">
    <h2 id="titulo-populares" class="seccion-titulo">Juegos populares</h2>

    <div class="destacados-grid">
      <?php foreach ($populares as $i => $juego) { ?>
        <a class="destacado <?= $i === 0 ? 'destacado--principal' : '' ?>"
          href="Mainsite.php?section=selectedgame&id=<?= (int)$juego['IDjuego'] ?>">
          <img src="<?= e($juego['imagen']) ?>" alt="" <?= $i === 0 ? '' : 'loading="lazy"' ?>>
          <?php if ($i === 0) { ?>
            <span class="destacado-etiqueta">Más Likeado</span>
          <?php } ?>
          <span class="destacado-info">
            <span class="destacado-nombre"><?= e($juego['Nombre']) ?></span>
            <span class="destacado-likes">♥ <?= (int)$juego['siLike'] ?></span>
          </span>
        </a>
      <?php } ?>
    </div>
  </section>
  <?php } ?>

  <!-- chips para saltar a cada categoría -->
  <nav class="categorias-nav" aria-label="Categorías">
    <?php foreach ($categorias as $categoria) { ?>
      <a class="chip" href="#categoria-<?= (int)$categoria['IDcategoria'] ?>"><?= e($categoria['nombre']) ?></a>
    <?php } ?>
  </nav>

  <!-- catálogo dividido en categorías -->
  <div class="categorias">
    <?php
    foreach ($categorias as $categoria) {
      $idCategoria = (int)$categoria['IDcategoria'];

      $juegos = mysqli_fetch_all(
        mysqli_query($conexion, "SELECT j.IDjuego, j.Nombre, j.imagen FROM juegos j
                                 JOIN juego_categoria jc ON j.IDjuego = jc.IDjuego
                                 WHERE jc.IDcategoria = $idCategoria"),
        MYSQLI_ASSOC
      );
    ?>
      <section class="categoria" id="categoria-<?= $idCategoria ?>" aria-labelledby="titulo-cat-<?= $idCategoria ?>">
        <h2 class="categoria-titulo" id="titulo-cat-<?= $idCategoria ?>">
          Juegos de <?= e($categoria['nombre']) ?>
          <span class="categoria-cantidad"><?= count($juegos) ?></span>
        </h2>

        <?php if ($juegos) { ?>
          <div class="catalogo-grid">
            <?php foreach ($juegos as $juego) { ?>
              <a class="tile" href="Mainsite.php?section=selectedgame&id=<?= (int)$juego['IDjuego'] ?>">
                <img src="<?= e($juego['imagen']) ?>" alt="" loading="lazy">
                <span class="tile-nombre"><?= e($juego['Nombre']) ?></span>
              </a>
            <?php } ?>
          </div>
        <?php } else { ?>
          <p class="categoria-vacia">No hay juegos en esta categoría.</p>
        <?php } ?>
      </section>
    <?php } ?>
  </div>

</div>