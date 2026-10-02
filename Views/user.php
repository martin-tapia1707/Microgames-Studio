<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* ---------- Juegos que le gustan al usuario (informacion.Pulgar = 1) ---------- */

// AJUSTÁ ESTO: si ya tenés un archivo de conexión (por ej. ../Database/conexion.php), usalo acá
// y reemplazá este bloque por tu require_once. Debe dejar una variable $conn (mysqli).
$conn = new mysqli("localhost", "root", "", "rodentgames");
$conn->set_charset("utf8mb4");

// ID del usuario: usa el de la sesión si existe; si no, lo busca por nombre
$idUsuario = $_SESSION['id'] ?? $_SESSION['IDusuario'] ?? $_SESSION['id_usuario'] ?? null;
if ($idUsuario === null && isset($_SESSION['usuario'])) {
    $q = $conn->prepare("SELECT IDusuario FROM usuario WHERE Nombre = ? LIMIT 1");
    $q->bind_param("s", $_SESSION['usuario']);
    $q->execute();
    $fila = $q->get_result()->fetch_assoc();
    $idUsuario = $fila['IDusuario'] ?? null;
    $q->close();
}

$favoritos = [];
if ($idUsuario !== null) {
    $q = $conn->prepare(
        "SELECT j.IDjuego, j.Nombre, j.imagen
           FROM informacion i
           JOIN juegos j ON j.IDjuego = i.IDjuego
          WHERE i.IDusuario = ? AND i.Pulgar = 1
          ORDER BY j.Nombre"
    );
    $q->bind_param("i", $idUsuario);
    $q->execute();
    $favoritos = $q->get_result()->fetch_all(MYSQLI_ASSOC);
    $q->close();
}

function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mi perfil | Microgames Studio</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../IMG/LogoEmpresa.png" />
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/sidebar.css">
    <link rel="stylesheet" href="../CSS/account.css">
</head>

<body>
<?php
    require_once "header.php";
    require_once "sidebar.php";
?>

    <main class="perfil">

        <!-- Avatar, nombre y rol -->
        <section class="perfil-tarjeta perfil-cabecera">
            <img class="perfil-avatar" src="<?= e($_SESSION['perfil'] ?? '') ?>" alt="Foto de perfil de <?= e($_SESSION['usuario'] ?? '') ?>">
            <div class="perfil-datos">
                <h1 class="perfil-nombre"><?= e($_SESSION['usuario'] ?? '') ?></h1>
                <span class="perfil-rol"><?= e($_SESSION['rol'] ?? '') ?></span>
            </div>
            <a href="edit.php" class="btn-perfil btn-editar"><i class='bx bx-edit'></i> Editar perfil</a>
        </section>

        <!-- Sobre mí -->
        <section class="perfil-tarjeta perfil-sobre">
            <h2 class="perfil-titulo">Sobre mí</h2>
            <p class="perfil-desc"><?= nl2br(e($_SESSION['descripcion'] ?? '')) ?></p>
        </section>

        <!-- Juegos con like -->
        <section class="perfil-tarjeta perfil-favoritos">
            <h2 class="perfil-titulo">
                Juegos que me gustan
                <span class="perfil-cantidad"><?= count($favoritos) ?></span>
            </h2>

            <?php if ($favoritos): ?>
                <div class="favoritos-grid">
                    <?php foreach ($favoritos as $juego): ?>
                        <a class="tile" href="Mainsite.php?section=selectedgame&id=<?= (int)$juego['IDjuego'] ?>">
                            <img src="<?= e($juego['imagen']) ?>" alt="" loading="lazy">
                            <span class="tile-nombre"><?= e($juego['Nombre']) ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="favoritos-vacio">
                    <p class="favoritos-vacio-titulo">Todavía no tenés juegos favoritos</p>
                    <p>Dale like a un juego y aparecerá acá.</p>
                    <a href="Mainsite.php" class="btn-perfil btn-explorar">Explorar juegos</a>
                </div>
            <?php endif; ?>
        </section>

        <a href="../Database/Controlador_CerrarLogin.php" class="btn-perfil btn-salir"><i class='bx bx-log-out'></i> Cerrar sesión</a>

    </main>

</body>

</html>