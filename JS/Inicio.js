// botones del carrusel populares

const carrusel = document.querySelector('.carrusel');
const btnPrev = document.querySelector('.prev');
const btnNext = document.querySelector('.next');

let desplazamiento = 750; 

btnNext.addEventListener('click', () => {
  carrusel.scrollBy({
    left: desplazamiento,
    behavior: 'smooth'
  });
});

btnPrev.addEventListener('click', () => {
  carrusel.scrollBy({
    left: -desplazamiento,
    behavior: 'smooth'
  });
});


// Deco del hover

document.addEventListener("DOMContentLoaded", () => {
  const juegos = document.querySelectorAll('.juegoCatalogo');

  juegos.forEach(juego => {
    const img = juego.querySelector('img');
    const texto = document.createElement('div');
    texto.classList.add('name-game');
    texto.textContent = img.alt; // usa el alt como texto visible
    juego.appendChild(texto);
  });
});

