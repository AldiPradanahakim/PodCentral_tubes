import "./bootstrap";

import "../css/app.css";
<<<<<<< HEAD

=======
>>>>>>> BackEnd
// JavaScript to show the sticky header only after scrolling
const stickyHeader = document.getElementById("sticky-header-container");
const mainHeader = document.querySelector(".container > .flex.items-center");

window.addEventListener("scroll", () => {
    const scrollPosition = window.scrollY;
    const mainHeaderBottom = mainHeader.getBoundingClientRect().bottom;

    if (mainHeaderBottom <= 0) {
        // Show sticky header when main header scrolls out of view
        stickyHeader.classList.remove("hidden");
    } else {
        // Hide sticky header when main header is visible
        stickyHeader.classList.add("hidden");
    }
});
