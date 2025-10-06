const Publicar = document.getElementById("publicacion");

Publicar.addEventListener('click', function() {
  const texto = document.getElementById("textoComentario").value.trim();

  if (texto === "") {
    alert("Escribi un comentario para poder comentar.");
    return;
  }



  
    fetch("../agregarComentario.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: `texto=${encodeURIComponent(texto)}`,
      credentials: "same-origin" 
    })
  .then(response => response.json())
  .then(data => {

      console.log(data);

    if (data.status === "ok") {
      // Crear estructura HTML del nuevo comentario
      const nuevoComentario = document.createElement("div");
      nuevoComentario.classList.add("comentario");

      nuevoComentario.innerHTML = `
        <div class="infoComentario">
          <p><strong>${data.usuario}</strong> - ${data.fecha}</p>
        </div>
        <div class="textoComentario">
          <p>${data.texto}</p>
        </div>
      `;

      // Insertar el nuevo comentario al principio
      const lista = document.getElementById("listaComentarios");
      lista.prepend(nuevoComentario);

      // Limpiar el textarea
      document.getElementById("textoComentario").value = "";
    } else {
      alert("Hubo un error al publicar el comentario.");
    }
  })
  .catch(error => console.error("Error:", error));
});