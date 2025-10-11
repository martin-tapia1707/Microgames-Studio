const carrusel = document.querySelector('.carrusel');
const btnPrev = document.querySelector('.prev');
const btnNext = document.querySelector('.next');

// Cantidad de desplazamiento (igual al ancho de un .juego)
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

