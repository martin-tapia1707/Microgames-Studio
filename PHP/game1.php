<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/game1.css">
  <link rel="stylesheet" href="../CSS/sidebar.css">
  <link rel="stylesheet" href="../CSS/header.css">
  <!-- Boxicons deidad -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <title>Game1</title>
</head>
<body>

    <?php
    require_once "header.php";
    require_once "sidebar.php";
    ?>


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

  <div class = "apartadoComentarios">

  <input type="text" placeholder="Escribe un comentario" class="comentar"><br>
  <button class="publicar" id="publicacion">Publicar</button>
  <button class="descartar" id="descartacion">Descartar</button>

</div>

</body>
</html>