
document.addEventListener("DOMContentLoaded", function() {
  var menuBtn = document.getElementById("menu-btn");
  var navbar = document.querySelector(".header .navbar");

  menuBtn.addEventListener("click", function() {
      navbar.classList.toggle("active");
  });
});
