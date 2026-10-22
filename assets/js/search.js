document.addEventListener("DOMContentLoaded", function() {
    const searchIcon = document.getElementById("search-icon");
    const searchForm = document.getElementById("search-form");

    // Toggle visibility when clicking the icon
    searchIcon.addEventListener("click", function(e) {
        // Only toggle if the image was clicked, not the form itself
        if (e.target.tagName.toLowerCase() === 'img') {
            searchForm.classList.toggle("visible");
        }
    });

    // Optional: click outside to close
    document.addEventListener("click", function(e) {
        if (!searchIcon.contains(e.target)) {
            searchForm.classList.remove("visible");
        }
    });
});
