document.addEventListener('DOMContentLoaded', () => {
    const form      = document.getElementById('form-editar');
    const error     = document.getElementById('mensaje-error');
    const pass      = document.getElementById('password-input');
    const passRep   = document.getElementById('repeat-password-input');
    const nombre    = document.getElementById('nombre');
    const foto      = document.getElementById('foto');
    const desc      = document.getElementById('descripcion');
    const contador  = document.getElementById('contador');
    const avatar    = document.getElementById('previa-avatar');
    const previaNom = document.getElementById('previa-nombre');
    const MAX_FOTO  = 5 * 1024 * 1024; // 5 MB

    /* --- Mostrar / ocultar contraseña (ojito) --- */
    document.querySelectorAll('.ver-pass').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = document.getElementById(btn.dataset.target);
            const visible = input.type === 'text';
            input.type = visible ? 'password' : 'text';
            btn.setAttribute('aria-label', visible ? 'Mostrar contraseña' : 'Ocultar contraseña');
            btn.querySelector('i').className = visible ? 'bx bx-show' : 'bx bx-hide';
        });
    });

    /* --- Vista previa del nombre en vivo --- */
    nombre.addEventListener('input', () => {
        previaNom.textContent = nombre.value.trim() || 'Tu nombre';
    });

    /* --- Vista previa de la foto antes de guardar --- */
    const fotoOriginal = avatar.src;
    let urlTemporal = null;

    foto.addEventListener('change', () => {
        if (urlTemporal) { URL.revokeObjectURL(urlTemporal); urlTemporal = null; }
        const archivo = foto.files[0];

        if (!archivo) { avatar.src = fotoOriginal; return; }
        if (archivo.size > MAX_FOTO) {
            foto.value = '';
            avatar.src = fotoOriginal;
            mostrarError('La foto pesa más de 5 MB. Elegí una más liviana.');
            return;
        }
        urlTemporal = URL.createObjectURL(archivo);
        avatar.src = urlTemporal;
        limpiarError();
    });

    /* --- Contador de caracteres de la descripción --- */
    function actualizarContador() {
        const largo = desc.value.length;
        const max = desc.maxLength;
        contador.textContent = largo + ' / ' + max;
        contador.classList.toggle('cerca', largo >= max * 0.9 && largo < max);
        contador.classList.toggle('lleno', largo >= max);
    }
    desc.addEventListener('input', actualizarContador);
    actualizarContador();

    /* --- Validación de contraseñas --- */
    function mostrarError(texto) {
        error.textContent = texto;
        error.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
    function limpiarError() {
        error.textContent = '';
        pass.classList.remove('invalido');
        passRep.classList.remove('invalido');
    }

    [pass, passRep].forEach(input => input.addEventListener('input', () => {
        // solo avisa en rojo cuando ya escribió en las dos
        const noCoinciden = passRep.value !== '' && pass.value !== passRep.value;
        passRep.classList.toggle('invalido', noCoinciden);
    }));

    form.addEventListener('submit', (ev) => {
        if (pass.value !== passRep.value) {
            ev.preventDefault();
            pass.classList.add('invalido');
            passRep.classList.add('invalido');
            mostrarError('Las contraseñas no coinciden.');
            passRep.focus();
        }
    });
});