<?php
  require_once '../Includes/Config.php';
 
  // escapa texto antes de imprimirlo en el HTML
  if (!function_exists('e')) {
    function e($texto) {
      return htmlspecialchars((string)$texto, ENT_QUOTES, 'UTF-8');
    }
  }
 
  /* ---------- helpers para el panel de controles ---------- */
 
  // Convierte el texto de la columna Controles en una lista de [teclas, accion].
  // Cada línea es del estilo "A,D / Flechas = Moverse"; lo que está antes del "="
  // son las teclas (separadas por "/", "," o " y ") y lo que está después es la acción.
  if (!function_exists('ordenarControles')) {
    function ordenarControles($texto) {
      $items = [];
      foreach (preg_split('/\R/', (string)$texto) as $linea) {
        $linea = trim($linea);
        if ($linea === '') continue;
 
        if (strpos($linea, '=') === false) { // línea sin "=": se muestra como nota
          $items[] = ['teclas' => [], 'accion' => $linea];
          continue;
        }
 
        [$izquierda, $derecha] = explode('=', $linea, 2);
        $teclas = preg_split('/\s*(?:\/|,|\s[yY]\s)\s*/', trim($izquierda), -1, PREG_SPLIT_NO_EMPTY);
        $items[] = ['teclas' => $teclas, 'accion' => trim($derecha)];
      }
      return $items;
    }
  }
 
  // "Left arrow", "ArrowUp", etc. se muestran como flechas dentro de la tecla
  if (!function_exists('etiquetaTecla')) {
    function etiquetaTecla($tecla) {
      $clave = strtolower(preg_replace('/\s+/', '', $tecla));
      $flechas = [
        'leftarrow' => '←', 'arrowleft' => '←',
        'rightarrow' => '→', 'arrowright' => '→',
        'uparrow' => '↑', 'arrowup' => '↑',
        'downarrow' => '↓', 'arrowdown' => '↓',
      ];
      return $flechas[$clave] ?? trim($tecla);
    }
  }
 
  // las teclas del mouse (click, cursor) se pintan distinto a las del teclado
  if (!function_exists('esTeclaRaton')) {
    function esTeclaRaton($tecla) {
      return (bool)preg_match('/click|clic|cursor|rat[oó]n/i', $tecla);
    }
  }
 
  if (!function_exists('capitalizar')) {
    function capitalizar($texto) {
      return mb_strtoupper(mb_substr($texto, 0, 1)) . mb_substr($texto, 1);
    }
  }
 
  /* ---------- datos del juego ---------- */
 
  // valores por defecto, por si no llega un id o el juego no existe
  $idJuego = isset($_GET['id']) ? (int)$_GET['id'] : 0;
  $juegoExiste = false;
  $nombre = "Juego no encontrado";
  $comoJugar = $queHacer = "No hay información disponible.";
  $direccion = $creador = $linkPagina = $controles = $imagen = "";
  $like = $dislike = 0;
  $id = $_SESSION['id'] ?? null; // id del USUARIO con sesión iniciada (null si no hay)
 
  if ($idJuego > 0) {
    $query = "SELECT * FROM juegos WHERE IDjuego = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $idJuego);
    $stmt->execute();
    $resultado = $stmt->get_result();
 
    if ($row = $resultado->fetch_assoc()) { // llama a los datos
      $juegoExiste = true;
      $nombre = $row['Nombre'];
      $comoJugar = $row['ComoJugar'];
      $queHacer = $row['QueHacer'];
      $direccion = $row['direccion']; // ruta del juego, va en el iframe
      $like = $row['siLike'];
      $dislike = $row['noLike'];
      $controles = $row['Controles']; // ya viene en la misma consulta, no hace falta otra
      $creador = $row['Creador'];
      $linkPagina = $row['Pagina'];
      $imagen = $row['imagen']; // portada, se usa en la pantalla de inicio
    }
  }
 
  // si no existe, se muestra un aviso y se corta acá (el JS de abajo no hace falta)
  if (!$juegoExiste) {
?>
<div class="pagina-juego">
  <div class="contenedorJuego">
    <h1>Juego no encontrado</h1>
    <p class="sinComentarios">Este juego no existe o fue eliminado. Volvé al inicio y elegí otro.</p>
  </div>
</div>
<?php
    return;
  }
 
  $listaControles = ordenarControles($controles);
?>
 
<div class="pagina-juego">
 
  <!-- JUEGO + VOTOS -->
  <div class="contenedorJuego">
    <h1><?= e($nombre) ?></h1>
 
    <div class="screen" id="pantalla">
      <!-- el juego se carga recién cuando se toca "Jugar" (ver selectedgame.js) -->
      <iframe id="juegoFrame" data-src="<?= e($direccion) ?>" title="<?= e($nombre) ?>" allow="autoplay; fullscreen" allowfullscreen></iframe>
 
      <button type="button" class="btnJugar" id="btnJugar" aria-label="Jugar a <?= e($nombre) ?>">
        <?php if ($imagen) { ?>
          <img class="btnJugar-portada" src="<?= e($imagen) ?>" alt="">
        <?php } ?>
        <span class="btnJugar-boton"><i class='bx bx-play'></i>Jugar</span>
        <span class="btnJugar-ayuda">Hacé clic para empezar</span>
      </button>
    </div>
 
    <div class="acciones">
      <button type="button" class="voto like" aria-label="Me gusta"
              onclick="<?= $id ? 'aumentar(' . (int)$idJuego . ', ' . (int)$id . ')' : 'nosesion()' ?>">
        <i class='bx bxs-like'></i><span class="count" id="likes"><?= (int)$like ?></span>
      </button>
 
      <button type="button" class="voto dislike" aria-label="No me gusta"
              onclick="<?= $id ? 'disminuir(' . (int)$idJuego . ', ' . (int)$id . ')' : 'nosesion()' ?>">
        <i class='bx bxs-dislike'></i><span class="count" id="dislike"><?= (int)$dislike ?></span>
      </button>
 
      <?php if (is_null($id)) { ?>
        <span class="acciones-ayuda">Iniciá sesión para votar</span>
      <?php } ?>
 
      <button type="button" class="voto btnSilencio" id="btnSilencio" aria-pressed="false" title="Silenciar (tecla M)">
        <i class='bx bx-volume-full'></i><span>Silenciar</span>
      </button>
 
      <button type="button" class="voto btnPantalla" id="btnPantalla" title="Pantalla completa (tecla F)">
        <i class='bx bx-fullscreen'></i><span>Pantalla completa</span>
      </button>
    </div>
  </div>
 
  <!-- COLUMNA LATERAL: controles + publicidad -->
  <aside class="columnaLateral">
    <section class="guiaControles" aria-labelledby="titulo-controles">
      <h2 class="tituloPanel" id="titulo-controles">Controles</h2>
 
      <?php if ($listaControles) { ?>
        <ul class="listaControles">
          <?php foreach ($listaControles as $control) { ?>
            <?php if ($control['teclas']) { ?>
              <li class="controlItem">
                <span class="controlTeclas">
                  <?php foreach ($control['teclas'] as $tecla) { ?>
                    <kbd class="teclaVisual<?= esTeclaRaton($tecla) ? ' teclaRaton' : '' ?>" title="<?= e($tecla) ?>"><?= e(etiquetaTecla($tecla)) ?></kbd>
                  <?php } ?>
                </span>
                <span class="controlAccion"><?= e(capitalizar($control['accion'])) ?></span>
              </li>
            <?php } else { ?>
              <li class="controlNota"><?= e($control['accion']) ?></li>
            <?php } ?>
          <?php } ?>
        </ul>
      <?php } else { ?>
        <p class="controlNota">Este juego no tiene controles cargados.</p>
      <?php } ?>
    </section>
 
    <!-- PUBLICIDAD -->
    <div class="publicidad">
      <img id="anuncio" src="" alt="Publicidad lateral">
    </div>
  </aside>
 
  <!-- JS con publicidad random -->
  <script>
  const imagenes = [
    "../IMG/publicidad.webp",
    "../IMG/publicidad2.webp",
    "../IMG/publicidad3.png",
    "../IMG/publicidad4.jpg",
    "../IMG/publicidad5.png",
  ]; // array publicidades posibles
 
  const publicidadRandom = Math.floor(Math.random() * imagenes.length); // hace el random
 
  const publicidadSeleccionada = imagenes[publicidadRandom]; // selecciona imagen random
 
  document.getElementById("anuncio").src = publicidadSeleccionada; // muestra la publicidad seleccionada
  </script>
 
  <!-- DESCRIPCIÓN DEL JUEGO -->
  <div class="contenedorTutorial">
    <h2>¿Cómo jugar?</h2>
    <p><?= nl2br(e($comoJugar)) ?></p>
 
    <h2>¿Qué hacer?</h2>
    <p><?= nl2br(e($queHacer)) ?></p>
 
    <h2>Créditos</h2>
    <p>Autor: <?= e($creador) ?></p>
    <?php if ($linkPagina) {
      $sitio = parse_url($linkPagina, PHP_URL_HOST); // solo el dominio, para no mostrar URLs larguísimas
    ?>
      <a class="enlaceOrigen" href="<?= e($linkPagina) ?>" target="_blank" rel="noopener noreferrer">
        Ver en <?= e($sitio ?: 'la página original') ?>
      </a>
    <?php } ?>
  </div>
 
  <!-- COMENTARIOS -->
  <div class="apartadoComentarios">
    <h2 class="titulocomentarios">Comentarios</h2>
 
    <textarea class="comentar" id="texto" maxlength="255" aria-label="Tu comentario" placeholder="Escribí un comentario (Ctrl + Enter para publicar)"></textarea>
 
    <div class="comentarAcciones">
      <button type="button" class="publicar" id="publicacion">Publicar</button>
      <button type="button" class="publicar" id="descartacion">Descartar</button>
      <span class="contadorTexto" id="contadorTexto">0 / 255</span>
    </div>
 
    <!-- Aca se van a insertar los nuevos comentarios -->
    <div id="listaComentarios"></div>
  </div>
 
</div>
 
<script src="../JS/selectedgame.js"></script>