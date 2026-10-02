<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Acerca de Nosotros - Microgames-Studio</title>
</head>

<body>
    <!-- TAPAR AL APARECER LA VENTANA DE INFORMACIÓN -->
    <div id="overlay"></div>

    <div class="main-content">

        <!-- DECORACIÓN (solo visual) -->
        <span class="deco deco-1"></span>
        <span class="deco deco-2"></span>
        <span class="deco deco-3"></span>

        <!-- INFORMACIÓN DE LA EMPRESA: texto a la izquierda, logo a la derecha -->
        <section class="about-section">

            <div class="cajasub">
                <h1 class="subtitle">ACERCA DE</h1>

                <p class="who-we-are-text">
                    ¡¡Hola querido usuario!! nos presentamos como Microgames-Studio, una compañía enfocada en páginas o productos simples sin tanta dificultad de interacción para el usuario. Nos encargamos de que tengan una buena y linda experiencia navegando por nuestro proyecto actual "RODENTGAMES", una página de juegos casuales para pasar un buen rato. Además, van a observar lo que podemos lograr con nuestros conocimientos como alumnos, motivando a chicos, grandes y principiantes interesados en la informática, brindándoles la bienvenida con este simple y entretenido proyecto. ¡Que lo disfruten!
                </p>
            </div>

            <div class="logo-wrap">
                <img class="companylogo" src="../IMG/LogoEmpresa.png" alt="Logo de la Empresa">
            </div>

        </section>

        <!-- APARTADO MIEMBROS INTRODUCCIÓN -->
        <section class="members-zone">
            <h2 class="sub">LOS MIEMBROS</h2>
            <p class="members-text">
                Somos alumnos del curso 4to 10ma del turno mañana del taller de informática. Nos conformamos como un equipo de 6 miembros que trabajamos en este proyecto para presentárselo a ustedes. Cada uno realizó un aporte destacado; si querés ver más información de nosotros, podés interactuar haciendo clic en los perfiles de abajo.
            </p>
        </section>

        <!-- TARJETAS DE LOS MIEMBROS (grilla) -->
        <div class="Box-control">

            <!-- Devin Segovia -->
            <div class="boxD">
                <div id="buttonD" onclick="infoDe()" class="devprofile"></div>
                <div class="member-profile">
                    <p class="member-name"><strong>Devin Segovia</strong></p>
                    <p class="member-role">Programador</p>
                </div>
            </div>

            <!-- Martin Tapia -->
            <div class="boxM">
                <div id="buttonM" onclick="infoMa()" class="martprofile"></div>
                <div class="member-profile">
                    <p class="member-name"><strong>Martin Tapia</strong></p>
                    <p class="member-role">Scrum Master</p>
                </div>
            </div>

            <!-- Agustín Escobar -->
            <div class="boxA">
                <div id="buttonA" onclick="infoAg()" class="agusprofile"></div>
                <div class="member-profile">
                    <p class="member-name"><strong>Agustin Escobar</strong></p>
                    <p class="member-role">Administrador de Base de datos</p>
                </div>
            </div>

            <!-- Nilton Bueno -->
            <div class="boxN">
                <img id="buttonN" onclick="infoNi()" class="niltprofile" src="../IMG/perfilnilton.jpg" alt="Perfil Nilton">
                <div class="member-profile">
                    <p class="member-name"><strong>Nilton Bueno</strong></p>
                    <p class="member-role">Diseñador</p>
                </div>
            </div>

            <!-- Daniel Patiño -->
            <div class="boxP">
                <img id="buttonP" onclick="infoPa()" class="patiprofile" src="../IMG/perfilpatiño.jpg" alt="Perfil Patiño">
                <div class="member-profile">
                    <p class="member-name"><strong>Daniel Patiño</strong></p>
                    <p class="member-role">Diseñador</p>
                </div>
            </div>

            <!-- Zaid Casimiro -->
            <div class="boxZ">
                <img id="buttonZ" onclick="infoZa()" class="zaidprofile" src="../IMG/perfilzaid.jpg" alt="Perfil Zaid">
                <div class="member-profile">
                    <p class="member-name"><strong>Zaid Casimiro</strong></p>
                    <p class="member-role">Desarrollador</p>
                </div>
            </div>

        </div> <!-- Fin Box-control -->


        <!-- MODALES DE INFORMACIÓN DE CADA MIEMBRO -->

        <!-- Info Devin -->
        <div class="header-info" id="devinfo">
            <div class="content-header-info">
                <h1 class="text-header">Rol: Programador</h1>
                <button onclick="cerrar()" class="close-info"><span class="close-info-logo">X</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-left">
                    <div class="D-profile-info"></div>
                    <div class="info-name"><p class="text-box-name">Nombre: Devin Segovia</p></div>
                    <div class="info-section"><p class="text-box-section">Apartado: Front-End</p></div>
                </div>
                <div class="info-data">
                    <p class="text-box-facts">Programador Front-End, encargado de la mayoría de los apartados de la empresa, JavaScript y CSS en general.</p>
                </div>
            </div>
        </div>

        <!-- Info Martin -->
        <div class="header-info" id="infomartin">
            <div class="content-header-info">
                <h1 class="text-header">Rol: Scrum Master</h1>
                <button class="close-info" onclick="cerrar()"><span class="close-info-logo">X</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-left">
                    <div class="M-profile-info"></div>
                    <div class="info-name"><p class="text-box-name">Nombre: Martin Tapia</p></div>
                    <div class="info-section"><p class="text-box-section">Apartado: Front-End - Back-End - Base de Datos</p></div>
                </div>
                <div class="info-data">
                    <p class="text-box-facts">Programador Front-End y Back-End, encargado del apartado principal, interfaz del videojuego seleccionado y la publicación de comentarios a la dirección del equipo en general + CRUD.</p>
                </div>
            </div>
        </div>

        <!-- Info Agustín -->
        <div class="header-info" id="infoescobar">
            <div class="content-header-info">
                <h1 class="text-header">Rol: Administrador de Base de datos</h1>
                <button class="close-info" onclick="cerrar()"><span class="close-info-logo">X</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-left">
                    <div class="A-profile-info"></div>
                    <div class="info-name"><p class="text-box-name">Nombre: Agustin Escobar</p></div>
                    <div class="info-section"><p class="text-box-section">Apartado: Back-End - Base de Datos</p></div>
                </div>
                <div class="info-data">
                    <p class="text-box-facts">Hizo el Modelo E/R más la mayoría de funcionalidades Back como Login / Register / Likes / Permisos y Roles. Tareas destacadas: Cambiar Datos / Editar perfil.</p>
                </div>
            </div>
        </div>

        <!-- Info Daniel -->
        <div class="header-info" id="infopati">
            <div class="content-header-info">
                <h1 class="text-header">Rol: Diseñador</h1>
                <button class="close-info" onclick="cerrar()"><span class="close-info-logo">X</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-left">
                    <div class="P-profile-info"></div>
                    <div class="info-name"><p class="text-box-name">Nombre: Daniel Patiño</p></div>
                    <div class="info-section"><p class="text-box-section">Apartado: Diseño y Back-End</p></div>
                </div>
                <div class="info-data">
                    <p class="text-box-facts">Hizo tareas destacadas como la Recuperación de Datos y la Verificación del Mail, también realizó la mayoría de Sprites del 2do videojuego y aportó en el Modelo E/R.</p>
                </div>
            </div>
        </div>

        <!-- Info Nilton -->
        <div class="header-info" id="infonilt">
            <div class="content-header-info">
                <h1 class="text-header">Rol: Diseñador</h1>
                <button class="close-info" onclick="cerrar()"><span class="close-info-logo">X</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-left">
                    <div class="N-profile-info"></div>
                    <div class="info-name"><p class="text-box-name">Nombre: Nilton Bueno</p></div>
                    <div class="info-section"><p class="text-box-section">Apartado: Videojuegos</p></div>
                </div>
                <div class="info-data">
                    <p class="text-box-facts">Hizo algunos sprites y botones del primer videojuego y algunos NPC del segundo.</p>
                </div>
            </div>
        </div>

        <!-- Info Zaid -->
        <div class="header-info" id="infozaid">
            <div class="content-header-info">
                <h1 class="text-header">Rol: Desarrollador</h1>
                <button class="close-info" onclick="cerrar()"><span class="close-info-logo">X</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-left">
                    <div class="Z-profile-info"></div>
                    <div class="info-name"><p class="text-box-name">Nombre: Zaid Casimiro</p></div>
                    <div class="info-section"><p class="text-box-section">Apartado: Programación</p></div>
                </div>
                <div class="info-data">
                    <p class="text-box-facts">Se encargó de programar el 1er y 2do Videojuego y realizó sprites correspondientes. Se encargó de arreglar bugs y hacer funcionales ambos videojuegos.</p>
                </div>
            </div>
        </div>

    </div> <!-- Fin main-content -->

    <script src="../JS/about.js"></script>
</body>

</html>