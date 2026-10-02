function togglePasswordVisibility(inputId, buttonId) {
    const input = document.getElementById(inputId);
    const button = document.getElementById(buttonId);

    if (!input || !button) return;

    if (input.type === 'password') {
        input.type = 'text';
        button.textContent = 'O'; // Indica que al presionar se oculta / texto visible
    } else {
        input.type = 'password';
        button.textContent = 'X'; // Indica que está en modo contraseña
    }
}

// Funciones vinculadas a los eventos onclick del HTML
function view() {
    togglePasswordVisibility('password-input', 'view-password');
}

function repeat() {
    togglePasswordVisibility('repeat-password-input', 'view-repeat-password');
}