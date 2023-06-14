let toggleMenu = document.querySelector("#toggleMenu");
let sidebar = document.querySelector(".sidebar");
let search = document.querySelector(".bx-search");

toggleMenu.onclick = function () {
  sidebar.classList.toggle("active");
};

search.onclick = function () {
  sidebar.classList.toggle("active");
};
