document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("repositorySearch");

    if (!searchInput) {
        return;
    }

    searchInput.addEventListener("keyup", function () {
        const value = this.value.toLowerCase();

        const rows = document.querySelectorAll("#repositoryTable tbody tr");

        rows.forEach(function (row) {
            row.style.display = row.innerText.toLowerCase().includes(value)
                ? ""
                : "none";
        });
    });
});
