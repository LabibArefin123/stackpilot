document.addEventListener("DOMContentLoaded", function () {
    const locationBtn = document.getElementById("openLocationModal");
    const locationModalElement = document.getElementById("locationModal");

    if (locationBtn && locationModalElement) {
        const locationModal = new bootstrap.Modal(locationModalElement);

        locationBtn.addEventListener("click", function (e) {
            e.preventDefault();
            locationModal.show();
        });
    }
});
