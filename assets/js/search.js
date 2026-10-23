document.addEventListener("DOMContentLoaded", function() {
    const searchIcon = document.querySelector("#search-icon");
    const searchForm = document.querySelector("#search-form");

    searchIcon.addEventListener("click", function(e) {

        if (e.target.tagName.toLowerCase() === 'svg') {
            searchForm.classList.toggle("visible");
        }
    });

    document.addEventListener("click", function(e) {
        if (!searchIcon.contains(e.target)) {
            searchForm.classList.remove("visible");
        }
    });
});
