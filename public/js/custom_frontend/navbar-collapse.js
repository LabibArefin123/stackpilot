document.addEventListener("DOMContentLoaded", () => {
    const drawer = document.getElementById("navbarCollapse");
    const openBtn = document.getElementById("navbarOpenBtn");
    const closeBtn = document.getElementById("navbarCloseBtn");
    const overlay = document.querySelector(".navbar-overlay");

    function openMenu() {
        drawer.classList.add("show");
        overlay.classList.add("show");
    }

    function closeMenu() {
        drawer.classList.remove("show");
        overlay.classList.remove("show");

        document.querySelectorAll(".dropdown-menu").forEach((menu) => {
            menu.classList.remove("show");
        });
    }

    openBtn.addEventListener("click", openMenu);

    closeBtn.addEventListener("click", closeMenu);

    overlay.addEventListener("click", closeMenu);

    document.querySelectorAll("#navbarCollapse .nav-link").forEach((link) => {
        if (!link.classList.contains("dropdown-toggle")) {
            link.addEventListener("click", closeMenu);
        }
    });

    document.querySelectorAll(".dropdown-toggle").forEach((toggle) => {
        toggle.addEventListener("click", function (e) {
            e.preventDefault();

            const menu = this.nextElementSibling;

            document.querySelectorAll(".dropdown-menu").forEach((item) => {
                if (item !== menu) {
                    item.classList.remove("show");
                }
            });

            menu.classList.toggle("show");
        });
    });
});
