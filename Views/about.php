
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




<br><br>




<p class="who-we-are-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo nulla impedit ducimus
    doloribus vitae quo
    fuga! Excepturi architecto veritatis corrupti? Eligendi doloribus at exercitationem expedita maxime!
    Consequuntur beatae facere minima. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita debitis
    impedit maiores aperiam aliquid qui enim fugiat, neque ut eaque illum perferendis dolorum officiis
    laboriosam
    sapiente voluptates voluptate nihil harum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam
    quisquam maiores mollitia cupiditate nesciunt impedit illum natus ipsum ea ullam. Odio deserunt aspernatur
    iusto, quo quis eum numquam praesentium quas?
</p>




<img class="companylogo" src="../IMG/LogoEmpresa.png">




<br><br>




<!-- APARTADO MIEMBROS -->




<h2 class="sub">LOS MIEMBROS</h2>




<p class="members-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et consequatur laboriosam eum
    cupiditate natus dolores error quaerat in deserunt, accusantium blanditiis necessitatibus, dolor iusto,
    soluta excepturi architecto sint! Architecto, ullam! Lorem ipsum dolor sit amet consectetur adipisicing
    elit. Et nulla, laborum voluptatibus excepturi beatae saepe eaque sequi recusandae fugiat enim, odit alias
    numquam corrupti non doloribus, perferendis porro! Officiis, neque.</p>




<br>




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




    <br>




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
                <p class="text-box-facts">Datos Datos Datos Datos Datos Datos Datos Datos Datos Datos Datos
                    Datos.</p>
            </div>
            <div class="info-section">
                <p class="text-box-section">Apartado: Programación</p>
            </div>
            <div class="charge-of">
                <p class="text-box-charge-of">Encargado de: Apartado de paginas e interacciones js.</p>
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
                <p class="text-box-facts">Datos Datos Datos Datos Datos Datos Datos Datos Datos Datos Datos
                    Datos.</p>
            </div>
            <div class="info-section">
                <p class="text-box-section">Apartado: Programación</p>
            </div>
            <div class="charge-of">
                <p class="text-box-charge-of">Encargado de: Coordinación, Back end, Front end, Diseño web.
                </p>
            </div>




        </div>
    </div>


    <div class="header-info" id="infoescobar">


        <div class="content-header-info">
            <h1 class="text-header">Rol: Admin de Base de datos</h1>
            <button id="cerrar" class="close-info" onclick="cerrar()"><p class="close-info-logo">X</p></button>
        </div>


        <div class="A-profile-info"></div>


        <div class="info-box">


            <div class="info-name">
                <p class="text-box-name">Nombre: Agustin Escobar</p>
            </div>
            <div class="info-data">
                <p class="text-box-facts">Datos Datos Datos Datos Datos Datos Datos Datos Datos Datos Datos
                    Datos.</p>
            </div>
            <div class="info-section">
                <p class="text-box-section">Apartado: Programación</p>
            </div>
            <div class="charge-of">
                <p class="text-box-charge-of">Encargado de: Back end, arquitectura de carpetas y modelo E/R.</p>
            </div>


        </div>
    </div>


</div>




<div class="header-info" id="infopati">


    <div class="content-header-info">
        <h1 class="text-header">Rol: Asistente de Base de datos</h1>
        <button id="cerrar" class="close-info" onclick="cerrar()"><p class="close-info-logo">X</button>
    </div>


    <div class="P-profile-info"></div>


    <div class="info-box">


        <div class="info-name">
            <p class="text-box-name">Nombre: Daniel Patiño</p>
        </div>
        <div class="info-data">
            <p class="text-box-facts">Datos Datos Datos Datos Datos Datos Datos Datos Datos Datos Datos
                Datos.</p>
        </div>
        <div class="info-section">
            <p class="text-box-section">Apartado: Diseño</p>
        </div>
        <div class="charge-of">
            <p class="text-box-charge-of">Encargado de: Modelo E/R.</p>
        </div>




    </div>


</div>




<div class="header-info" id="infonilt">


    <div class="content-header-info">
        <h1 class="text-header">Rol: Pixel art en juegos</h1>
        <button id="cerrar" class="close-info" onclick="cerrar()"><p class="close-info-logo">X</p></button>
    </div>


    <div class="N-profile-info"></div>


    <div class="info-box">


        <div class="info-name">
            <p class="text-box-name">Nombre: Nilton Bueno</p>
        </div>
        <div class="info-data">
            <p class="text-box-facts">Datos Datos Datos Datos Datos Datos Datos Datos Datos Datos Datos
                Datos.</p>
        </div>
        <div class="info-section">
            <p class="text-box-section">Apartado: juegos</p>
        </div>
        <div class="charge-of">
            <p class="text-box-charge-of">Encargado de: Sprites.</p>
        </div>




    </div>


</div>


<div class="header-info" id="infozaid">


    <div class="content-header-info">
        <h1 class="text-header">Rol: Programador de juegos</h1>
        <button id="cerrar" class="close-info" onclick="cerrar()"><p class="close-info-logo">X</p></button>
    </div>


    <div class="Z-profile-info"></div>


    <div class="info-box">


        <div class="info-name">
            <p class="text-box-name">Nombre: Zaid Casimiro</p>
        </div>
        <div class="info-data">
            <p class="text-box-facts">Datos Datos Datos Datos Datos Datos Datos Datos Datos Datos Datos
                Datos.</p>
        </div>
        <div class="info-section">
            <p class="text-box-section">Apartado: juegos</p>
        </div>
        <div class="charge-of">
            <p class="text-box-charge-of">Encargado de: Programador juegos, sprites.</p>
        </div>




    </div>




</div>


<script src="../JS/about.js"></script>