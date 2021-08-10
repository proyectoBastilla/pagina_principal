function myFunction() {
  const x = document.getElementById("myTopnav");
  if (x.className === "header") {
    x.className = "responsive";
  } else {
    x.className = "header";
  }
}