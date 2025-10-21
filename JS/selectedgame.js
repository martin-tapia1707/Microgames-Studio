document.getElementById("publicacion").addEventListener("click", function() {
  const textoComentario = document.getElementById("textoComentario").value.trim();

  if (textoComentario === "") {
    alert("Por favor escribí un comentario antes de publicar.");
    return;
  }

  // Crear el cuadro en el HTML
  const nuevoCuadro = document.createElement("div");
  nuevoCuadro.classList.add("cuadroComentario");
  nuevoCuadro.textContent = textoComentario;
  document.getElementById("listaComentarios").appendChild(nuevoCuadro);

  // Enviar el comentario al servidor con fetch
  fetch("agregarComentario.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: "comentario=" + encodeURIComponent(textoComentario)
  })
  .then(response => response.text())
  .then(data => {
    console.log("Servidor respondió:", data);
    // podés mostrar un mensaje o limpiar el campo
    document.getElementById("textoComentario").value = "";
  })
  .catch(error => {
    console.error("Error al enviar el comentario:", error);
  });
});