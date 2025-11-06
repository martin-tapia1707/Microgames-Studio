async function aumentar(idjuego, idusuario){
  console.log(idjuego, idusuario, dislike);

  let datos = {juegoID: idjuego, usuarioID: idusuario};
  try {
    let respuesta = await fetch('../Database/like.php', {
      method: "POST",
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(datos),
    });

    if (!respuesta.ok) {
      // usar backticks para interpolar
      throw new Error(`HTTP error! status: ${respuesta.status}`);
    }

    // evitar redeclarar 'datos' — darle otro nombre
    let respuestaServidor = await respuesta.json();
    console.log('respuesta del servidor:', respuestaServidor);
    console.log(respuestaServidor.likeCantidad);
    document.getElementById('likes').textContent = respuestaServidor.likeCantidad;
    document.getElementById('dislike').textContent = respuestaServidor.dislikeCantidad;
    

  } catch (error) {
    console.log("hubo un problema con la peticion:", error);
  }
}

async function disminuir(idjuego, idusuario){
  console.log(idjuego, idusuario);

  let datos2 = {juegoID: idjuego, usuarioID: idusuario };
  try {
    let respuesta2 = await fetch('../Database/dislike.php', {
      method: "POST",
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(datos2),
    });

    if (!respuesta2.ok) {
      // usar backticks para interpolar
      throw new Error(`HTTP error! status: ${respuesta2.status}`);
    }

    // evitar redeclarar 'datos' — darle otro nombre
    let respuestaServidor2 = await respuesta2.json();
    console.log('respuesta del servidor:', respuestaServidor2);
    document.getElementById('dislike').textContent = respuestaServidor2.dislikeCantidad;
    document.getElementById('likes').textContent = respuestaServidor2.cantidadLike;
    

  } catch (error) {
    console.log("hubo un problema con la peticion:", error);
  }
}

function nosesion(){
  alert("inicia sesion para dar like o dislike");
}


const IDjuego = new URLSearchParams(window.location.search).get('id');

function cargarComentarios() {
  fetch("../mostrarComentario.php?IDjuego=" + IDjuego)
    .then(response => response.text())
    .then(html => {
      document.getElementById("listaComentarios").innerHTML = html;
    })
    .catch(err => console.error("Error al cargar comentarios:", err));
}

// Llamar al cargar la página
window.addEventListener("DOMContentLoaded", cargarComentarios);

document.getElementById("publicacion").addEventListener("click", function() {
  const textoComentario = document.getElementById("texto").value.trim();

  if (textoComentario === "") {
    alert("Por favor escribí un comentario antes de publicar.");
    return;
  }

  fetch("../agregarComentario.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "texto=" + encodeURIComponent(textoComentario) +
          "&IDjuego=" + encodeURIComponent(IDjuego),
    credentials: "include"
  })
  .then(response => response.json())
  .then(data => {
    console.log("Servidor respondió:", data);
    if (data.status === "ok") {
      document.getElementById("texto").value = "";
      cargarComentarios(); // recargar lista después de publicar
    } else {
      alert("Error: " + data.mensaje);
    }
  })
  .catch(error => {
    console.error("Error al enviar el comentario:", error);
  });
});

document.getElementById("descartacion").addEventListener("click", function() {
 const borrarTexto = document.getElementById("texto").value = "";
})