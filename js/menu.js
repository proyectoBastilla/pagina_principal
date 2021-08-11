function myFunction() {
  const x = document.getElementById("header-back");
  if (x.className === "header") {
    x.className = "responsive";
  } else {
    x.className = "header";
  }
}