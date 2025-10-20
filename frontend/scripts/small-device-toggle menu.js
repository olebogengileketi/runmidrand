//JavaScript toggle function for the hamburger menu (so .navbar-collapse opens/closes on mobile)
document.addEventListener("DOMContentLoaded", function () {
const toggler = document.querySelector(".navbar-toggler");
const collapse = document.querySelector(".navbar-collapse");

toggler.addEventListener("click", () => {
    collapse.classList.toggle("active");

    // Swap icon between hamburger (list) and close (x)
    const icon = toggler.querySelector("i");
    icon.classList.toggle("bi-list");
    icon.classList.toggle("bi-x");
});
});
