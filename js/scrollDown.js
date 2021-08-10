//El botón
const mybutton = document.getElementById("irArriba");
//Header
const header = document.getElementById("header");

// Cuando pase de 200 px se muestra el botón
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 100) {
    mybutton.style.display = "block";
    header.className += " sticky";
  } else {
    mybutton.style.display = "none";
    header.className = "header";
  }
}

// Para subir 
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}