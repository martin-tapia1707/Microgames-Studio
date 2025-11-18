function infoDe() {


    document.getElementById('devinfo').style.display = 'block';
    const overlay = document.getElementById('overlay').style.display ='block'; // display block muestra menu al hacer click en la foto


}


function infoMa() {


    document.getElementById('infomartin').style.display = 'block';
    const overlay = document.getElementById('overlay').style.display ='block';
}


function infoAg() {


    document.getElementById('infoescobar').style.display = 'block';
    const overlay = document.getElementById('overlay').style.display ='block';
}


function infoPa(){
    document.getElementById('infopati').style.display = 'block';
    const overlay = document.getElementById('overlay').style.display = 'block';
}


function infoNi(){
    document.getElementById('infonilt').style.display = 'block';
    const overlay = document.getElementById('overlay').style.display ='block';    
}


function infoZa(){
    document.getElementById('infozaid').style.display = 'block';
    const overlay = document.getElementById('overlay').style.display ='block';    
}




function cerrar() {

    const overlay = document.getElementById('overlay');

    overlay.style.display = 'none';


    document.getElementById('devinfo').style.display = 'none';


    document.getElementById('infomartin').style.display = 'none';


    document.getElementById('infoescobar').style.display = 'none';


    document.getElementById('infopati').style.display = 'none';


    document.getElementById('infonilt').style.display = 'none';


    document.getElementById('infozaid').style.display = 'none';
}
