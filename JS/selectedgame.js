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