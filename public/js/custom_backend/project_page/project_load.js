$(function () {
    // Show only on the projects index page
    if (window.location.pathname.includes("/projects")) {
        const modal = document.getElementById("projectLoadingModal");

        if (modal) {
            modal.style.display = "flex";
            modal.style.opacity = "1";
        }
    }
});
