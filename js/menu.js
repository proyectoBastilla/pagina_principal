function myFunction() {
  const x = document.getElementById("header");
  if (x.className === "header") {
    x.className = "responsive";
  } else {
    x.className = "header";
  }
}