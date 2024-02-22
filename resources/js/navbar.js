// Nav Bar Styling
const navbar = document.getElementById('navbar-desktop');

window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;

    if (scrollY > 160) {
        navbar.classList.add('bg-background');
        navbar.classList.remove('backdrop-blur');
    } else {
        navbar.classList.remove('bg-background');
        navbar.classList.add('backdrop-blur');
    }
});

const navbarMobile = document.getElementById('navbar-mobile');

window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;

    if (scrollY > 160) {
        navbarMobile.classList.add('bg-background');
        navbarMobile.classList.remove('backdrop-blur');
    } else {
        navbarMobile.classList.remove('bg-background');
        navbarMobile.classList.add('backdrop-blur');
    }
});

// Change Nav Bar depending on view width.
window.changeNav = () => {
    const mobileNav = document.getElementById('navbar-mobile');
    const desktopNav = document.getElementById('navbar-desktop');

    if (window.innerWidth <= 768) {
        mobileNav.classList.remove('hidden');
        desktopNav.classList.add('hidden');
    } else {
        mobileNav.classList.add('hidden');
        desktopNav.classList.remove('hidden');
    }
}

changeNav();
window.addEventListener('resize', changeNav);


// Open Menu
window.openMenu = () => {
    const navMenu = document.getElementById('nav-menu');
    navMenu.style.width = "80vw";
}

window.closeMenu = () => {
    const navMenu = document.getElementById('nav-menu');
    navMenu.style.width = "0";
}