function view(){
    const input = document.getElementById('password-input');
    const button = document.getElementById('view-password');
    


    if(input.type === 'password'){
        input.type = 'text';
        button.textContent = 'O'; // si apretas O se vuelve tipo contraseña
    } else{
        input.type = 'password';
        button.textContent = 'X' // si apretas X se vuelve tipo texto
    } 
}

function repeat(){
    const input = document.getElementById('repeat-password-input');
    const button = document.getElementById('view-repeat-password');

    if(input.type === 'password'){
        input.type = 'text';
        button.textContent = 'O';
    } else{
        input.type = 'password';
        button.textContent = 'X'
    } 

}