addEventListener("DOMContentLoaded", main);

function main() {


    backgorundColor();
    addSize();

}


function addSize() {
    let parrafos = document.getElementsByTagName('p');
    let tamañoInicial = parseFloat(window.getComputedStyle(parrafos[0]).fontSize); 
    for (let i = 0; i < parrafos.length; i++) {
        parrafos[i].addEventListener('click', function () {
            let tamaño = parseFloat(window.getComputedStyle(this).fontSize);
            this.style.fontSize = (tamaño + 1) + 'px';
            if (tamaño >= tamañoInicial * 2) {
                this.style.fontSize = tamañoInicial + 'px';
            }
        });
    }
}
function backgorundColor() {
    let parrafos = document.getElementsByTagName('p');
    for (let i = 0; i < parrafos.length; i++) {
        parrafos[i].addEventListener('click', function () {
            let color = window.getComputedStyle(this).getPropertyValue("background-color");
            this.style.backgroundColor = (color === 'rgb(144, 238, 144)') ? 'rgb(173, 216, 230)' : 'rgb(144, 238, 144)';
        });
    }



}