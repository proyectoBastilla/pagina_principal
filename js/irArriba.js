//El botón
var mybutton = document.getElementById("irArriba");

// Cuando pase de 200 px se muestra el botón
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 200) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// Para subir 
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}