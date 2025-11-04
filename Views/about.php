
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Document</title>
</head>


<body>


</body>


</html>








<!-- INFORMACION DE LA EMPRESA -->






<div class="cajasub">
    <h1 class="subtitle">ACERCA DE</h1>
</div>









<p class="who-we-are-text">¡¡Hola querido usuario!! nosotros nos presentamos como Microgames-Studio, en la cual somos una compania para páginas o productos simples sin tanta dificultad de interactuar para el usuario, en donde nos encargamos de que ustedes tengan una buena y linda experiencia pasando por nuestro proyecto actual "RODENTGAMES", una página de juegos casuales y para pasar el buen rato. Además van a observar lo que podemos llegar a hacer con nuestros conocimientos siendo alumnos, motivando a chicos, grandes y principiantes interesados en el apartado de la infórmatica, brindandoles la bienvenida con este simple y entretenido proyecto. Que lo disfruten.
</p>




<img class="companylogo" src="../IMG/LogoEmpresa.png">









<!-- APARTADO MIEMBROS -->




<h2 class="sub">LOS MIEMBROS</h2>




<p class="members-text">Somos alumnos del curso 4to 10ma en el turno mañana de taller del aréa de computación. Nos formamos como 6 miembros de los cuales trabajamos en este proyecto para presentarlo a ustedes, cada uno hizo un aporte destacado, si queres ver más información de nosotros, podés interactuar abajo con las tarjetas del integrante que mas te interese, para ver información de alguno de nosotros haciendo click en los perfiles.</p>









<!---    TARJETAS DE LOS MIEMBROS      --->




<div class="Box-control">




    <div class="boxD">
        <div id="buttonD" onclick="infoDe()" class="devprofile"></div>


        <div class="member-profile">
            <p class="member-name"><strong>Devin Segovia</strong></p>
            <p class="member-mail"></p>
        </div>


    </div>




    <div class="boxA">
        <div id="buttonA" onclick="infoAg()" class="agusprofile"></div>


        <div class="member-profile">
            <p class="member-name"><strong>Agustin Escobar</strong></p>
            <p class="member-mail"></p>
        </div>
    </div>




    <div class="boxM">
        <div id="buttonM" onclick="infoMa()" class="martprofile"></div>


        <div class="member-profile">
            <p class="member-name"><strong>Martin Tapia</strong></p>
            <p class="member-mail"></p>
        </div>
    </div>




    <div class="boxN">
        <img id="buttonN" onclick="infoNi()" class="niltprofile" src="../IMG/perfilnilton.jpg">


        <div class="member-profile">
            <p class="member-name"><strong>Nilton Bueno</strong></p>
            <p class="member-mail"></p>
        </div>
    </div>




    <div class="boxP">
        <img id="buttonP" onclick="infoPa()" class="patiprofile" src="../IMG/perfilpatiño.jpg">


        <div class="member-profile">
            <p class="member-name"><strong>Dianiel Patiño</strong></p>
            <p class="member-mail"></p>
        </div>
    </div>




    <div class="boxZ">
        <img id="buttonZ" onclick="infoZa()" class="zaidprofile" src="../IMG/perfilzaid.jpg">


        <div class="member-profile">
            <p class="member-name"><strong>Zaid Casimiro</strong></p>
            <p class="member-mail"></p>
        </div>
    </div>









    <!-- CAJA Y TEXTO DE INFORMACION DE MIEMBROS -->




    <div class="header-info" id="devinfo">


        <div class="content-header-info">
            <h1 class="text-header">Rol: Programador</h1>
            <button id="cerrar" onclick="cerrar()" class="close-info"><p class="close-info-logo">X</p></button>
        </div>


        <div class="D-profile-info"></div>


        <div class="info-box">


            <div class="info-name">
                <p class="text-box-name">Nombre: Devin Segovia</p>
            </div>
            <div class="info-data">
                <p class="text-box-facts">Programador Front-End, encargado de la mayoría de los apartados de la empresa, encargado de Javascript y CSS en general.</p>
            </div>
            <div class="info-section">
                <p class="text-box-section">Apartado: Front-End</p>
            </div>
            <div class="charge-of">
                <p class="text-box-charge-of">Encargado de: Programación.</p>
            </div>




        </div>
    </div>




    <div class="header-info" id="infomartin">


        <div class="content-header-info">
            <h1 class="text-header">Rol: Scrum Master</h1>
            <button id="cerrar" class="close-info" onclick="cerrar()"><p class="close-info-logo">X</p></button>
        </div>


        <div class="M-profile-info"></div>


        <div class="info-box">


            <div class="info-name">
                <p class="text-box-name">Nombre: Martin Tapia</p>
            </div>
            <div class="info-data">
                <p class="text-box-facts">Programador Front-End y Back-End, encargado del apartado principal, interfaz del videojuego seleccionado y la publicación de comentarios a la dirección del equipo en general + CRUD.</p>
            </div>
            <div class="info-section">
                <p class="text-box-section">Apartado: Front-End - Back-End - Base de Datos</p>
            </div>
            <div class="charge-of">
                <p class="text-box-charge-of">Encargado de: Coordinación y Programación.
                </p>
            </div>




        </div>
    </div>


    <div class="header-info" id="infoescobar">


        <div class="content-header-info">
            <h1 class="text-header">Rol: Administrador de Base de datos</h1>
            <button id="cerrar" class="close-info" onclick="cerrar()"><p class="close-info-logo">X</p></button>
        </div>


        <div class="A-profile-info"></div>


        <div class="info-box">


            <div class="info-name">
                <p class="text-box-name">Nombre: Agustin Escobar</p>
            </div>
            <div class="info-data">
                <p class="text-box-facts">Hizo el Modelo E/R más la mayoría de funcionalidades Back. como el Login / Register / Likes / Permisos Roles, tuvo tareas destacadas como Cambiar Datos / Editar perfil.</p>
            </div>
            <div class="info-section">
                <p class="text-box-section">Apartado: Back-End - Base de Datos</p>
            </div>
            <div class="charge-of">
                <p class="text-box-charge-of">Encargado de: Programación y Arquitectura de carpetas.</p>
            </div>


        </div>
    </div>


</div>




<div class="header-info" id="infopati">


    <div class="content-header-info">
        <h1 class="text-header">Rol: Diseñador</h1>
        <button id="cerrar" class="close-info" onclick="cerrar()"><p class="close-info-logo">X</button>
    </div>


    <div class="P-profile-info"></div>


    <div class="info-box">


        <div class="info-name">
            <p class="text-box-name">Nombre: Daniel Patiño</p>
        </div>
        <div class="info-data">
            <p class="text-box-facts">Hizo tareas destacadas como la Recuperación de Datos y la Verificación del Mail, también hizo la mayoría de Sprites del 2do videojuego, aportó bastante en el Modelo E/R.</p>
        </div>
        <div class="info-section">
            <p class="text-box-section">Apartado: Diseño y Back-End</p>
        </div>
        <div class="charge-of">
            <p class="text-box-charge-of">Encargado de: Diseño y Programación.</p>
        </div>




    </div>


</div>




<div class="header-info" id="infonilt">


    <div class="content-header-info">
        <h1 class="text-header">Rol: Diseñador</h1>
        <button id="cerrar" class="close-info" onclick="cerrar()"><p class="close-info-logo">X</p></button>
    </div>


    <div class="N-profile-info"></div>


    <div class="info-box">


        <div class="info-name">
            <p class="text-box-name">Nombre: Nilton Bueno</p>
        </div>
        <div class="info-data">
            <p class="text-box-facts">Hizo algunos sprites y botones del primer videojuego y algunos NPC del segundo.</p>
        </div>
        <div class="info-section">
            <p class="text-box-section">Apartado: Videojuegos</p>
        </div>
        <div class="charge-of">
            <p class="text-box-charge-of">Encargado de: Sprites.</p>
        </div>




    </div>


</div>


<div class="header-info" id="infozaid">


    <div class="content-header-info">
        <h1 class="text-header">Rol: Desarrolllador</h1>
        <button id="cerrar" class="close-info" onclick="cerrar()"><p class="close-info-logo">X</p></button>
    </div>


    <div class="Z-profile-info"></div>


    <div class="info-box">


        <div class="info-name">
            <p class="text-box-name">Nombre: Zaid Casimiro</p>
        </div>
        <div class="info-data">
            <p class="text-box-facts">Se encargo de programar el 1er y 2do Videojuego y realizó algunos sprites correspondientes a los mismos, se encargó de arreglar bugs y hacer funcional ambos videojuegos.</p>
        </div>
        <div class="info-section">
            <p class="text-box-section">Apartado: Programación</p>
        </div>
        <div class="charge-of">
            <p class="text-box-charge-of">Encargado de: Desarrollo de videojuegos.</p>
        </div>




    </div>




</div>


<script src="../JS/about.js"></script>