// add hover class to seleted list item

let list = document.querySelectorAll(".navigation li");

function activeLink() {
    list.forEach(item => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

list.forEach(item => item.addEventListener("mouseover",activeLink));

// Menu toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");
let logo = document.querySelector(".logo")

toggle.onclick = function() {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
    logo.classList.toggle("active")
}