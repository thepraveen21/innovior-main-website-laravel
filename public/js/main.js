document.addEventListener("DOMContentLoaded", function () {

    const dropdowns = document.querySelectorAll(".mega-dropdown");

    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector(".dropdown-toggle");

        toggle.addEventListener("click", (e) => {
            e.preventDefault();

            // close others
            dropdowns.forEach(d => {
                if (d !== dropdown) d.classList.remove("active");
            });

            dropdown.classList.toggle("active");
        });
    });

    // close on outside click
    document.addEventListener("click", (e) => {
        if (!e.target.closest(".mega-dropdown")) {
            dropdowns.forEach(d => d.classList.remove("active"));
        }
    });

});
