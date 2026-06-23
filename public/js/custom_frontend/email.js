document.addEventListener("DOMContentLoaded", function () {
    const emailBtn = document.getElementById("openEmailModal");
    const emailModalElement = document.getElementById("emailModal");
    const closeBtn = document.getElementById("closeEmail");

    if (!emailModalElement) return;

    const emailModal = new bootstrap.Modal(emailModalElement);

    // Open modal
    if (emailBtn) {
        emailBtn.addEventListener("click", function (e) {
            e.preventDefault();
            emailModal.show();
        });
    }

    // Close modal (manual close button)
    if (closeBtn) {
        closeBtn.addEventListener("click", function () {
            emailModal.hide();
        });
    }
});
