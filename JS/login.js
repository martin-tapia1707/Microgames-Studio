function view(){
    const input = document.getElementById('password-input');
    const button = document.getElementById('view-password');
    


    if(input.type === 'password'){
        input.type = 'text';
        button.textContent = 'O';
    } else{
        input.type = 'password';
        button.textContent = 'X'
    } 
}
