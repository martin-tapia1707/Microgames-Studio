    const content = document.querySelector('.content');
    const juegos = document.querySelectorAll('.juego');

    function rotateCarousel(nuevoCentral) {
        let central = document.querySelector('.juegoSelect');
        let izquierdo = document.querySelector('.juegoSecuizq');
        let derecho = document.querySelector('.juegoSecuder');

        // Si paso el mouse sobre el izquierdo → ese se hace central y el central pasa a la derecha
        if (nuevoCentral === izquierdo) {
            central.classList.remove('juegoSelect');
            central.classList.add('juegoSecuder');

            izquierdo.classList.remove('juegoSecuizq');
            izquierdo.classList.add('juegoSelect');

            derecho.classList.remove('juegoSecuder');
            derecho.classList.add('juegoSecuizq');
        }

        // Si paso el mouse sobre el derecho → ese se hace central y el central pasa a la izquierda
        if (nuevoCentral === derecho) {
            central.classList.remove('juegoSelect');
            central.classList.add('juegoSecuizq');

            derecho.classList.remove('juegoSecuder');
            derecho.classList.add('juegoSelect');

            izquierdo.classList.remove('juegoSecuizq');
            izquierdo.classList.add('juegoSecuder');
        }
    }

    // Eventos de hover (mouseenter en vez de click)
    juegos.forEach(juego => {
        juego.addEventListener('mouseenter', () => {
            if (!juego.classList.contains('juegoSelect')) {
                rotateCarousel(juego);
            }
        });
    });