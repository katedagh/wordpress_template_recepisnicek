window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');

    if (window.scrollY > 150 && !document.body.classList.contains('menu-open')) {
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
        scrollPosition = window.scrollY;
        body.style.top = `-${scrollPosition}px`;
        body.classList.add('menu-open');
    } else {
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

// type website header js
const title = document.querySelector("#typing-title");
const text = title.textContent;

title.textContent = "";

let index = 0;

function typeText() {
  if (index < text.length) {
    title.textContent += text[index];
    index++;
    setTimeout(typeText, 100);
  }
}

typeText();