      <?php
        include("../Includes/Config.php");

        ?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="../CSS/header.css">
          <link rel="stylesheet" href="../CSS/sidebar.css">
          <link rel="stylesheet" href="../CSS/register.css">
          <title>Register</title>
      </head>

      <body>
          <div class="header-info">

              <img class="logo" src="../IMG/logopagina.png">

              <div class="content-register">

                  <h1 class="text-register"><b>Registrarse</b></h1>

                  <div class="caja-info">

                      <a href="Mainsite.php?section=login" class="sign-up">
                          <p>¿Ya tenés una cuenta? ¡¡inicia sesión!!</p>
                      </a>



                      <form action="../Database/InsertarUsuario.php" method="post">
                          <br>
                          <p class="user"><b>Nombre de usuario</b></p><br>
                          <input type="text" name="nombre" class="text-box-name-user" placeholder="Nombre de usuario"><br>

                          <p class="password"><b>Contraseña</b></p><br><input id="password-input" class="text-box-password" type="password"
                              placeholder="Contraseña" name="contraseña"><button id="view-password" type="button" class="password-button" onclick="view()">X</button>
                          <p class="repeat"><b>Repetir contraseña</b></p><br><input id="repeat-password-input" class="text-box-repeat-password"
                              type="password" placeholder="Repetir contraseña" name="contraseñaRep"><button id="view-repeat-password" type="button"
                              class="repeat-password-button" onclick="repeat()">X</button>

                          <p class="mail"><b>Correo electronico</b></p><br>
                          <input type="email" name="correo" class="text-box-mail" type="text" placeholder="Correo electronico"><br>
                          <input type="submit" value="registrarse" name="registrar" class="make"><br><br>
                          
                      </form>
                      <?php
                        echo $_SESSION["error"];
                        $_SESSION["error"] = "";
                        ?>



                  </div>


                  <script src="../JS/register.js"></script>

      </body>

      </html>