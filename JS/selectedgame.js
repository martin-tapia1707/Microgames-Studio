/* =====================================================
   AVISOS (reemplazan a los alert)
   ===================================================== */
function mostrarAviso(texto, tipo = 'info') { // tipo: 'ok' | 'error' | 'info'
  let contenedor = document.getElementById('avisos');
  if (!contenedor) {
    contenedor = document.createElement('div');
    contenedor.id = 'avisos';
    contenedor.className = 'avisos';
    contenedor.setAttribute('role', 'status');
    contenedor.setAttribute('aria-live', 'polite');
    document.body.appendChild(contenedor);
  }

  const aviso = document.createElement('div');
  aviso.className = `aviso aviso--${tipo}`;
  aviso.textContent = texto;
  contenedor.appendChild(aviso);

  setTimeout(() => {
    aviso.classList.add('saliendo');
    setTimeout(() => aviso.remove(), 300);
  }, 3200);
}


/* =====================================================
   LIKE / DISLIKE
   ===================================================== */
let votando = false; // evita mandar dos votos a la vez

// cambia el número y le da un saltito si realmente cambió
function actualizarContador(idElemento, valor) {
  const elemento = document.getElementById(idElemento);
  if (!elemento || valor === undefined || valor === null) return;
  if (elemento.textContent === String(valor)) return;

  elemento.textContent = valor;
  elemento.classList.remove('pop');
  void elemento.offsetWidth; // fuerza a reiniciar la animación
  elemento.classList.add('pop');
}

async function votar(endpoint, idjuego, idusuario) {
  if (votando) return;
  votando = true;

  const botones = document.querySelectorAll('.voto.like, .voto.dislike');
  botones.forEach(boton => boton.disabled = true);

  try {
    const respuesta = await fetch(endpoint, {
      method: "POST",
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ juegoID: idjuego, usuarioID: idusuario }),
    });

    if (!respuesta.ok) {
      throw new Error(`HTTP error! status: ${respuesta.status}`);
    }

    const datos = await respuesta.json();

    // like.php devuelve "likeCantidad" y dislike.php devuelve "cantidadLike":
    // se aceptan los dos nombres para que el contador nunca quede en undefined
    actualizarContador('likes', datos.likeCantidad ?? datos.cantidadLike);
    actualizarContador('dislike', datos.dislikeCantidad ?? datos.cantidadDislike);

  } catch (error) {
    console.log("hubo un problema con la peticion:", error);
    mostrarAviso('No se pudo registrar tu voto. Probá de nuevo.', 'error');
  } finally {
    votando = false;
    botones.forEach(boton => boton.disabled = false);
  }
}

// estas dos se siguen llamando desde el onclick del PHP
function aumentar(idjuego, idusuario) {
  return votar('../Database/like.php', idjuego, idusuario);
}

function disminuir(idjuego, idusuario) {
  return votar('../Database/dislike.php', idjuego, idusuario);
}

function nosesion() {
  mostrarAviso('Iniciá sesión para dar like o dislike.', 'info');
}


/* =====================================================
   JUEGO: pantalla de inicio y pantalla completa
   ===================================================== */
const pantalla = document.getElementById('pantalla');
const juegoFrame = document.getElementById('juegoFrame');
const btnJugar = document.getElementById('btnJugar');
const btnPantalla = document.getElementById('btnPantalla');

// El iframe se carga recién cuando la persona toca "Jugar". Así el juego
// empieza con un clic real (el audio funciona) y recibe el foco del teclado,
// que es lo que evita que las flechas y la barra espaciadora muevan la página.
function iniciarJuego() {
  if (!juegoFrame || juegoFrame.getAttribute('src')) return; // ya está cargado

  juegoFrame.addEventListener('load', () => juegoFrame.focus(), { once: true });
  juegoFrame.src = juegoFrame.dataset.src;
  if (btnJugar) btnJugar.hidden = true;
  parchearCuandoSea(); // prepara el control de sonido (ver sección SONIDO)
}

if (btnJugar) btnJugar.addEventListener('click', iniciarJuego);

const pantallaCompletaActiva = () => document.fullscreenElement || document.webkitFullscreenElement;
const puedePantallaCompleta = !!(pantalla && (pantalla.requestFullscreen || pantalla.webkitRequestFullscreen));

function alternarPantallaCompleta() {
  if (!puedePantallaCompleta) return;

  if (pantallaCompletaActiva()) {
    (document.exitFullscreen || document.webkitExitFullscreen).call(document);
    return;
  }

  iniciarJuego(); // si todavía no arrancó, arranca
  const pedir = pantalla.requestFullscreen || pantalla.webkitRequestFullscreen;
  const promesa = pedir.call(pantalla);
  if (promesa && promesa.catch) {
    promesa.catch(() => mostrarAviso('Tu navegador no permitió la pantalla completa.', 'error'));
  }
}

if (btnPantalla) {
  if (puedePantallaCompleta) {
    btnPantalla.addEventListener('click', alternarPantallaCompleta);
  } else {
    btnPantalla.hidden = true; // por ejemplo, iPhone no permite pantalla completa de un elemento
  }
}

// al entrar o salir de pantalla completa, el teclado vuelve al juego
function alCambiarPantallaCompleta() {
  if (juegoFrame && juegoFrame.getAttribute('src')) juegoFrame.focus();
}
document.addEventListener('fullscreenchange', alCambiarPantallaCompleta);
document.addEventListener('webkitfullscreenchange', alCambiarPantallaCompleta);

/* =====================================================
   SONIDO: silenciar el juego
   -----------------------------------------------------
   Los juegos de Godot suenan con la Web Audio API. Como los juegos están en
   el mismo sitio que la página (mismo origen), desde acá se puede "entrar" al
   iframe y poner un volumen maestro (GainNode) entre el juego y los parlantes.
   Silenciar = bajar ese volumen a 0, sin pausar el juego.
   ===================================================== */
const btnSilencio = document.getElementById('btnSilencio');
const CLAVE_SILENCIO = 'rodentgames-silenciado';
const volumenesMaestros = []; // un { ctx, ganancia } por cada AudioContext que cree el juego

// la preferencia se recuerda entre juegos
let silenciado = false;
try {
  silenciado = localStorage.getItem(CLAVE_SILENCIO) === '1';
} catch (error) { /* sin localStorage: arranca con sonido */ }

function actualizarBotonSilencio() {
  if (!btnSilencio) return;
  const texto = silenciado ? 'Activar sonido' : 'Silenciar';
  btnSilencio.setAttribute('aria-pressed', String(silenciado));
  btnSilencio.querySelector('i').className = silenciado ? 'bx bx-volume-mute' : 'bx bx-volume-full';
  btnSilencio.querySelector('span').textContent = texto;
  btnSilencio.title = `${texto} (tecla M)`;
}

function aplicarSilencio() {
  volumenesMaestros.forEach(({ ctx, ganancia }) => {
    // un fundido cortito evita el "clic" al cortar el sonido de golpe
    ganancia.gain.setTargetAtTime(silenciado ? 0 : 1, ctx.currentTime, 0.015);
  });

  // por si algún juego usa etiquetas <audio> o <video> comunes
  try {
    juegoFrame.contentDocument.querySelectorAll('audio, video').forEach(medio => {
      medio.muted = silenciado;
    });
  } catch (error) { /* otro origen: no se puede acceder */ }
}

function alternarSilencio() {
  silenciado = !silenciado;
  try {
    localStorage.setItem(CLAVE_SILENCIO, silenciado ? '1' : '0');
  } catch (error) { /* no pasa nada si no se puede guardar */ }

  aplicarSilencio();
  actualizarBotonSilencio();
  mostrarAviso(silenciado ? 'Juego silenciado' : 'Sonido activado', 'info');
}

// si el juego viene de otro sitio (otro origen) el navegador no deja tocarlo
function audioNoDisponible() {
  if (!btnSilencio) return;
  btnSilencio.disabled = true;
  btnSilencio.title = 'Este juego no se puede silenciar desde acá. Usá el volumen de tu dispositivo.';
}

// Reemplaza el constructor AudioContext del iframe por uno que, cada vez que
// el juego crea un contexto de audio, le intercala el volumen maestro.
function parchearAudio() {
  let ventana;
  try {
    ventana = juegoFrame.contentWindow;
    void ventana.document; // tira un error si el juego es de otro origen
  } catch (error) {
    audioNoDisponible();
    return;
  }

  instalarAtajosEnJuego(ventana);

  const Original = ventana.AudioContext || ventana.webkitAudioContext;
  if (!Original || Original.__rgParcheado) return; // sin Web Audio, o ya parcheado

  const Parcheado = new Proxy(Original, {
    get(objetivo, propiedad) {
      return propiedad === '__rgParcheado' ? true : Reflect.get(objetivo, propiedad, objetivo);
    },
    construct(objetivo, argumentos) {
      const ctx = Reflect.construct(objetivo, argumentos);
      try {
        const destinoReal = ctx.destination;
        const ganancia = ctx.createGain();
        ganancia.gain.value = silenciado ? 0 : 1;
        ganancia.connect(destinoReal);

        // algunos motores leen estos datos del destino
        try {
          Object.defineProperty(ganancia, 'maxChannelCount', { value: destinoReal.maxChannelCount });
        } catch (error) { /* no es crítico */ }

        // desde ahora, todo lo que el juego conecte a "destination" pasa por el volumen maestro
        Object.defineProperty(ctx, 'destination', { get: () => ganancia, configurable: true });
        volumenesMaestros.push({ ctx, ganancia });
      } catch (error) {
        console.log('No se pudo preparar el control de sonido:', error);
      }
      return ctx;
    }
  });

  ventana.AudioContext = Parcheado;
  if (ventana.webkitAudioContext) ventana.webkitAudioContext = Parcheado;
}

// Hay que parchear ANTES de que el juego cree su audio. Se intenta apenas el
// iframe empieza a cargar y se repite al terminar de cargar (es seguro hacerlo dos veces).
function parchearCuandoSea() {
  let intentos = 0;
  const reloj = setInterval(() => {
    intentos++;
    try {
      const direccion = juegoFrame.contentWindow.location.href;
      if (direccion && direccion !== 'about:blank') {
        clearInterval(reloj);
        parchearAudio();
        return;
      }
    } catch (error) { // otro origen
      clearInterval(reloj);
      audioNoDisponible();
      return;
    }
    if (intentos > 200) clearInterval(reloj); // se rinde a los ~2 segundos
  }, 10);

  juegoFrame.addEventListener('load', () => {
    clearInterval(reloj);
    parchearAudio();
    aplicarSilencio();
  }, { once: true });
}

if (btnSilencio) btnSilencio.addEventListener('click', alternarSilencio);
actualizarBotonSilencio();


/* =====================================================
   ATAJOS DE TECLADO: F = pantalla completa, M = silenciar
   ===================================================== */
function manejarAtajo(evento, desdeElJuego) {
  const etiqueta = (evento.target.tagName || '').toLowerCase();
  if (etiqueta === 'textarea' || etiqueta === 'input' || evento.target.isContentEditable) return;
  if (evento.ctrlKey || evento.metaKey || evento.altKey || evento.repeat) return;

  const tecla = (evento.key || '').toLowerCase();
  if (tecla !== 'f' && tecla !== 'm') return;

  // dentro del juego no se bloquea la tecla: el juego también la recibe
  if (!desdeElJuego) evento.preventDefault();

  if (tecla === 'f') alternarPantallaCompleta();
  else alternarSilencio();
}

document.addEventListener('keydown', (evento) => manejarAtajo(evento, false));

// Cuando se juega, el foco está dentro del iframe y la página no recibe las
// teclas. Por eso los atajos también se enganchan al documento del juego.
function instalarAtajosEnJuego(ventana) {
  if (ventana.__rgAtajos) return;
  ventana.__rgAtajos = true;
  ventana.addEventListener('keydown', (evento) => manejarAtajo(evento, true));
}


/* =====================================================
   COMENTARIOS
   ===================================================== */
const IDjuego = new URLSearchParams(window.location.search).get('id');

const campoTexto = document.getElementById('texto');
const contadorTexto = document.getElementById('contadorTexto');
const btnPublicar = document.getElementById('publicacion');
const btnDescartar = document.getElementById('descartacion');
const LIMITE_TEXTO = campoTexto && campoTexto.maxLength > 0 ? campoTexto.maxLength : 255;

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

// contador de caracteres: se pone naranja cerca del límite y rojo al llegar
function actualizarContadorTexto() {
  const largo = campoTexto.value.length;
  contadorTexto.textContent = `${largo} / ${LIMITE_TEXTO}`;
  contadorTexto.classList.toggle('cerca', largo >= LIMITE_TEXTO * 0.9 && largo < LIMITE_TEXTO);
  contadorTexto.classList.toggle('lleno', largo >= LIMITE_TEXTO);
}

async function publicarComentario() {
  const textoComentario = campoTexto.value.trim(); // agarra el texto del comentario escrito

  if (textoComentario === "") { // si está vacío tira un aviso
    mostrarAviso('Escribí un comentario antes de publicar.', 'info');
    campoTexto.focus();
    return;
  }

  // mientras se envía, el botón queda deshabilitado (evita comentarios duplicados)
  const textoOriginal = btnPublicar.textContent;
  btnPublicar.disabled = true;
  btnPublicar.textContent = 'Publicando…';

  try {
    const respuesta = await fetch("../agregarComentario.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: "texto=" + encodeURIComponent(textoComentario) + // envia texto de comentario a php
            "&IDjuego=" + encodeURIComponent(IDjuego),      // envia id juego a php
      credentials: "include"
    });

    const data = await respuesta.json();

    if (data.status === "ok") {
      campoTexto.value = "";
      actualizarContadorTexto();
      cargarComentarios(); // recargar lista después de publicar
      mostrarAviso('Comentario publicado', 'ok');
    } else {
      mostrarAviso(data.mensaje || 'No se pudo publicar el comentario.', 'error');
    }
  } catch (error) {
    console.error("Error al enviar el comentario:", error); // si hubo un inconveniente con el envio del fetch
    mostrarAviso('No se pudo enviar el comentario. Probá de nuevo.', 'error');
  } finally {
    btnPublicar.disabled = false;
    btnPublicar.textContent = textoOriginal;
  }
}

btnPublicar.addEventListener("click", publicarComentario);

// Ctrl + Enter (o Cmd + Enter) publica sin tocar el botón
campoTexto.addEventListener("keydown", (evento) => {
  if ((evento.ctrlKey || evento.metaKey) && evento.key === "Enter") {
    evento.preventDefault();
    publicarComentario();
  }
});

campoTexto.addEventListener("input", actualizarContadorTexto);

// botón descartar: borra el contenido del textarea
btnDescartar.addEventListener("click", () => {
  campoTexto.value = "";
  actualizarContadorTexto();
  campoTexto.focus();
});

actualizarContadorTexto();