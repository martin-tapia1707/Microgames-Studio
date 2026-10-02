<?php
    session_start();
    include "../Includes/Config.php";

    function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

    // Mensaje de error que deja ControladorDatos.php (se limpia después de leerlo).
    // strip_tags quita el HTML viejo (<br>, <p>) por si el controlador todavía lo manda.
    $error = strip_tags($_SESSION["error"] ?? "");
    $_SESSION["error"] = "";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar perfil | Microgames Studio</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../IMG/LogoEmpresa.png" />
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/sidebar.css">
    <link rel="stylesheet" href="../CSS/edit.css">
</head>
<body>
<?php
    require_once "header.php";
    require_once "sidebar.php";
?>

    <main class="editar">

        <!-- Vista previa: se actualiza en vivo mientras editás -->
        <aside class="editar-tarjeta editar-previa">
            <img id="previa-avatar" class="previa-avatar" src="<?= e($_SESSION['perfil'] ?? '') ?>" alt="Tu foto de perfil">
            <div>
                <p id="previa-nombre" class="previa-nombre"><?= e($_SESSION['usuario'] ?? '') ?></p>
                <span class="previa-rol"><?= e($_SESSION['rol'] ?? '') ?></span>
            </div>
            <p class="previa-ayuda">Así te van a ver los demás.</p>
        </aside>

        <section class="editar-tarjeta">
            <h1 class="editar-titulo">Editar perfil</h1>

            <!-- Cambiar datos (misma acción y mismos name que antes) -->
            <form id="form-editar" class="editar-form" method="post" action="../Database/ControladorDatos.php" enctype="multipart/form-data">

                <div id="mensaje-error" class="mensaje-error" role="alert"><?= e($error) ?></div>

                <div class="grupo">
                    <h2 class="grupo-titulo">Cuenta</h2>

                    <div class="campo">
                        <label for="nombre">Nombre de usuario</label>
                        <input id="nombre" type="text" name="nuevoNombre" maxlength="40" required
                               value="<?= e($_SESSION['usuario'] ?? '') ?>">
                    </div>

                    <div class="campo">
                        <label for="correo">Correo electrónico</label>
                        <input id="correo" type="email" name="nuevoCorreo" maxlength="255" required
                               value="<?= e($_SESSION['email'] ?? '') ?>">
                    </div>
                </div>

                <div class="grupo">
                    <h2 class="grupo-titulo">Contraseña</h2>
                    <p class="campo-nota">Dejala vacía si no querés cambiarla.</p>

                    <div class="campo">
                        <label for="password-input">Nueva contraseña</label>
                        <div class="campo-pass">
                            <input id="password-input" type="password" name="nuevaContraseña" maxlength="40"
                                   placeholder="Nueva contraseña" autocomplete="new-password">
                            <button type="button" class="ver-pass" data-target="password-input" aria-label="Mostrar contraseña">
                                <i class='bx bx-show'></i>
                            </button>
                        </div>
                    </div>

                    <div class="campo">
                        <label for="repeat-password-input">Repetir contraseña</label>
                        <div class="campo-pass">
                            <input id="repeat-password-input" type="password" name="nuevaContraseñaR" maxlength="40"
                                   placeholder="Repetir contraseña" autocomplete="new-password">
                            <button type="button" class="ver-pass" data-target="repeat-password-input" aria-label="Mostrar contraseña">
                                <i class='bx bx-show'></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="grupo">
                    <h2 class="grupo-titulo">Perfil</h2>

                    <div class="campo campo-foto">
                        <label for="foto">Foto de perfil</label>
                        <input id="foto" type="file" name="foto" accept="image/*">
                    </div>

                    <div class="campo">
                        <label for="descripcion">Descripción</label>
                        <textarea id="descripcion" name="nuevaDescripcion" maxlength="255"
                                  placeholder="Contanos algo sobre vos"><?= e($_SESSION['descripcion'] ?? '') ?></textarea>
                        <span id="contador" class="contador">0 / 255</span>
                    </div>
                </div>

                <div class="editar-acciones">
                    <button type="submit" name="Guardar" value="Actualizar perfil" class="btn-editar btn-guardar">Actualizar perfil</button>
                    <a href="user.php" class="btn-editar">Cancelar</a>
                </div>
            </form>
        </section>
    </main>

    <script src="../JS/edit.js"></script>

</body>

</html>