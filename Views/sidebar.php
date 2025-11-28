<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>

<div class="sidebar">
    <ul>
        <li>
            <a href="Mainsite.php?section=home" class="nav-link">
                <span class="item-icon"><i class='bx bxs-home'></i></span>
                <span class="item-txt">Inicio</span>
            </a>
        </li>
        <li>
            <a href="Mainsite.php?section=about" class="nav-link">
                <span class="item-icon"><i class='bx bxs-group'></i></span> <!-- ícono de grupo de personas -->
                <span class="item-txt">Creadores</span>
            </a>
        </li>
        <?php if (isset($_SESSION["usuario"])): ?>
        <li>
            <a href="Mainsite.php?section=user" class="nav-link">
                <span class="item-icon"><i class='bx bxs-user-circle'></i></span> <!-- ícono de usuario más claro -->
                <span class="item-txt">Perfil</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (isset($_SESSION["usuario"]) && ($_SESSION["rol"] == "Moderador"||$_SESSION["rol"] == "Administrador"||$_SESSION["rol"]=="Editor"|| $_SESSION["rol"]=="Product Owner")): ?>
        <li>
            <a href="Mainsite.php?section=crud" class="nav-link">
                <span class="item-icon"><i class='bx  bx-cog'  ></i></span> <!-- ícono de usuario más claro -->
                <span class="item-txt">Crud</span>
            </a>
        </li>
        <?php endif; ?>
    </ul>
</div>


