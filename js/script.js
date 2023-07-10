// ketika humberger menu di klik
const navNav = document.querySelector(".navbar-nav");

document.querySelector("#humberger-menu").onclick = () => {
  navNav.classList.toggle("active");
};

// keluar ketika menekan diluar sidebar
const humberger = document.querySelector("#humberger-menu");

document.addEventListener("click", function (e) {
  if (!humberger.contains(e.target) && !navNav.contains(e.target)) {
    navNav.classList.remove("active");
  }
});
