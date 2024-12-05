 /**
 *** copyright 2024 Bishoy Rafiq
 **/






const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

menuBtn.addEventListener("click", (e) => {
  navLinks.classList.toggle("open");

  const isOpen = navLinks.classList.contains("open");
  menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
});


const header = document.querySelector("[data-header]");


const activeElementOnScroll = function () {
  if (window.scrollY > 100) {
    header.classList.add("active");
  } else {
    header.classList.remove("active");
  }
}

window.addEventListener("scroll", activeElementOnScroll);











const scrollRevealOption = {
  origin: "bottom",
  distance: "50px",
  duration: 1000,
};






ScrollReveal().reveal(".story__image img", {
  ...scrollRevealOption,
  origin: "done",
});
ScrollReveal().reveal(".story__content .section__header", {
  ...scrollRevealOption,
  delay: 500,
});
ScrollReveal().reveal(".story__content h4", {
  ...scrollRevealOption,
  delay: 400,
});
ScrollReveal().reveal(".story__content p", {
  ...scrollRevealOption,
  delay: 500,
});
ScrollReveal().reveal(".story__content h3", {
  ...scrollRevealOption,
  delay: 1000,
});


