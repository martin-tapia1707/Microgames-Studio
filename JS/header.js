    document.addEventListener('DOMContentLoaded', function() {
        const fotoPerfil = document.querySelector('.fotousuario img');
        const menu = document.getElementById('visualizacion');
        const container = document.getElementById('usuarioContainer');
        
        // Abrir/cerrar menú al clic en la foto
        fotoPerfil.addEventListener('click', function(e) {
            e.stopPropagation(); // Evita que se propague al documento
            menu.classList.toggle('show');
        });
        
        // Cerrar menú al clic fuera de él
        document.addEventListener('click', function(e) {
            if (!container.contains(e.target)) {
                menu.classList.remove('show');
            }
        });
        
        // Opcional: Cerrar al presionar Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && menu.classList.contains('show')) {
                menu.classList.remove('show');
            }
        });
    });