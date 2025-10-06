<div class="contenedorJuego">

  <h1>NombreJuego</h1>
  <div class="screen"></div>

  <!-- Contenedor para los botones -->
  <div class="acciones">
    <button class="like"><i class='bx bxs-like'></i></button>
    <button class="dislike"><i class='bx bxs-dislike'></i></button>
  </div>

</div>

<div class="contenedorTutorial">

  <h1>¿Como jugar?</h1>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat 
        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
    </p>

  <h1>¿Que hacer?</h1>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat 
        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
    </p>

</div>

<div class="apartadoComentarios">
  <h1 class="titulocomentarios">Comentarios</h1>

  <textarea class="comentar" id="textoComentario" placeholder="Escribe un comentario"></textarea><br>
  <button class="publicar" id="publicacion">Publicar</button>
  <button class="publicar" id="descartacion">Descartar</button>

  <!-- Aca se van a insertar los nuevos comentarios -->
  <div id="listaComentarios"></div>
</div>

<script src="../js/selectedgame.js"></script>