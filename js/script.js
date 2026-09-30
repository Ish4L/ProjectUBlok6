const activePage = window.location.pathname;

const navLinks = document.querySelectorAll('header ul li a');
navLinks.forEach(link => {
    if (link.href.includes(`${activePage}`)) {
        link.classList.add('active');
    }
})

const sideLinks = document.querySelectorAll('.sidebar ul li a');
sideLinks.forEach(link => {
    if (link.href.includes(`${activePage}`)) {
        link.parentElement.classList.add('active');
    }
})

const navbar = document.querySelector('header.header-homepage');
window.addEventListener('scroll', () => {
    if (window.scrollY > 0) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});