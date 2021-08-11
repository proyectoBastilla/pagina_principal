//El botón
const mybutton = document.getElementById("irArriba");
//Header
const header = document.getElementById("header");

// Cuando pase de 200 px se muestra el botón y sticky header
window.onscroll = function() {irArriba(); sticky()};

function irArriba() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 200) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function sticky() {
  if (document.body.scrollTop > 0.1 || document.documentElement.scrollTop > 1) {
    if (header.className != "header sticky" && header.className != "responsive") {
      header.className = "header sticky";      
    }
  } else {
    header.className = "header-frente";
  }
}