const primaryNav = document.querySelector('.navigation-bar');
const navToggle = document.querySelector('.mobile-nav-toggle');

navToggle.addEventListener('click', () => {
    const visibility = primaryNav.getAttribute("data-visible");

    if(visibility === "false") {
        primaryNav.setAttribute("data-visible", true);
        navToggle.setAttribute("aria-expanded", true);
    } else if (visibility === "true") {
        primaryNav.setAttribute("data-visible", false);
        navToggle.setAttribute("aria-expanded", false);
    }
});

window.onscroll = function() {
    const header = document.getElementById('nav-bar');
    if (window.pageYOffset > 80) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
};