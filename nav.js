window.addEventListener("scroll", function () {
  const nav = document.querySelector("nav");
  if (window.scrollY > 50) {
    nav.classList.add("nav_scrolled");
  } else {
    nav.classList.remove("nav_scrolled");
  }
});
