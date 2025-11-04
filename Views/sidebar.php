<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>



<?php if (isset($_SESSION["usuario"]) && ($_SESSION["rol"] == "Moderador"||$_SESSION["rol"] == "Administrador"||$_SESSION["rol"]=="Editor"|| $_SESSION["rol"]=="Product Owner")): ?>

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
        <!-- <li>
            <a href="Mainsite.php?section=help" class="nav-link">
                <span class="item-icon"><i class='bx bxs-help-circle'></i></span>
                <span class="item-txt">Ayuda</span>
            </a>
        </li> -->
        <li>
            <a href="Mainsite.php?section=user" class="nav-link">
                <span class="item-icon"><i class='bx bxs-user-circle'></i></span> <!-- ícono de usuario más claro -->
                <span class="item-txt">Perfil</span>
            </a>
        </li>
        <li>
            <a href="Mainsite.php?section=crud" class="nav-link">
                <span class="item-icon"><i class='bx  bx-cog'  ></i></span> <!-- ícono de usuario más claro -->
                <span class="item-txt">Crud</span>
            </a>
        </li>
    </ul>
</div>

<?php elseif (isset($_SESSION["usuario"])): ?>

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
        <!-- <li>
            <a href="Mainsite.php?section=help" class="nav-link">
                <span class="item-icon"><i class='bx bxs-help-circle'></i></span>
                <span class="item-txt">Ayuda</span>
            </a>
        </li> -->
        <li>
            <a href="Mainsite.php?section=user" class="nav-link">
                <span class="item-icon"><i class='bx bxs-user-circle'></i></span> <!-- ícono de usuario más claro -->
                <span class="item-txt">Perfil</span>
            </a>
        </li>
    </ul>
</div>


            <?php else: ?>

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
        <li>
            <a href="Mainsite.php?section=help" class="nav-link">
                <span class="item-icon"><i class='bx bxs-help-circle'></i></span> <!-- ícono de ayuda más claro -->
                <span class="item-txt">Ayuda</span>
            </a>
        </li>
        <li>
    </ul>
</div>

    <?php endif; ?>


