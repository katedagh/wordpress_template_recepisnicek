window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');

    // sticky navbar jen když není otevřené menu
    if (window.scrollY > 100 && !document.body.classList.contains('menu-open')) {
        navbar.classList.add('sticky');
    } else {
        navbar.classList.remove('sticky');
    }
});

const mobileMenuButton = document.querySelector('#mobile-menu-icon');
const mobileMenu = document.querySelector('#menu');
const body = document.body;

let scrollPosition = 0;

mobileMenuButton.addEventListener('click', () => {

    if (!body.classList.contains('menu-open')) {
        // 🔒 otevření menu – zakázat scroll
        scrollPosition = window.scrollY;
        body.style.top = `-${scrollPosition}px`;
        body.classList.add('menu-open');
    } else {
        // 🔓 zavření menu – vrátit scroll
        body.classList.remove('menu-open');
        body.style.top = '';
        window.scrollTo(0, scrollPosition);
    }

    mobileMenu.classList.toggle('active');
    mobileMenuButton.classList.toggle('open');
});


document.addEventListener('DOMContentLoaded', function () {
    const parents = document.querySelectorAll(
        '.menu-item-has-children > a'
    );

    parents.forEach(link => {
        link.addEventListener('click', function (e) {
            if (window.innerWidth <= 600) {
                e.preventDefault();
                const submenu = this.nextElementSibling;
                submenu.classList.toggle('open');
            }
        });
    });
});

