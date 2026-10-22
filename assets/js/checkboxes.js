document.addEventListener("DOMContentLoaded", function() {
    const checkboxes = document.querySelectorAll(".store-check");

    checkboxes.forEach(checkbox => {
        const key = checkbox.dataset.key;
         const tr = checkbox.closest("tr");

        // Načtení uložené hodnoty
        const saved = localStorage.getItem(key);
        if (saved === "true") {
            checkbox.checked = true;
            tr.classList.add("store-checked"); // přeškrtnutí
        }

        // Uložení po kliknutí
        checkbox.addEventListener("change", function() {
            localStorage.setItem(key, checkbox.checked);
              if (checkbox.checked) {
                tr.classList.add("store-checked");
            } else {
                tr.classList.remove("store-checked");
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('unit-toggle');
    const grams = document.querySelectorAll('.unit-g');
    const cups = document.querySelectorAll('.unit-cups');

    toggle.addEventListener('click', () => {
        const isGrams = toggle.dataset.unit === 'g';

        grams.forEach(el => el.style.display = isGrams ? 'none' : 'inline');
        cups.forEach(el => el.style.display = isGrams ? 'inline' : 'none');

        toggle.dataset.unit = isGrams ? 'cups' : 'g';
        toggle.textContent = isGrams
            ? 'Přepnout na gramy'
            : 'Přepnout na hrníčky';
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('unit-toggle');
    const grams = document.querySelectorAll('.unit-g');
    const cups = document.querySelectorAll('.unit-cups');

    function updateUnits() {
        if (toggle.checked) {
            grams.forEach(el => el.style.display = 'none');
            cups.forEach(el => el.style.display = 'inline');
        } else {
            grams.forEach(el => el.style.display = 'inline');
            cups.forEach(el => el.style.display = 'none');
        }
    }

    toggle.addEventListener('change', updateUnits);

    // Inicializace na gramách
    updateUnits();
});
