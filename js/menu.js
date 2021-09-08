function despliegue() {
  const x = document.getElementById("header-back");
  if (x.className === "header") {
    x.className = "responsive";
  } else {
    x.className = "header";
  }
}

function repliegue() {
  const x = document.getElementById("header-back");
  if (x.className === "responsive") {
    x.className = "header";
  }
}