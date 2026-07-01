$(function () {
    let serverModal;
    let hostingModal;

    /*
    |--------------------------------------------------------------------------
    | Open Hosting Account Modal
    |--------------------------------------------------------------------------
    */

    $(document).on("click", "#openHostingAccountModal", function (e) {
        e.preventDefault();

        const serverElement = document.getElementById("serverOptimizeModal");
        const hostingElement = document.getElementById("hostingAccountModal");

        serverModal = bootstrap.Modal.getOrCreateInstance(serverElement);
        hostingModal = bootstrap.Modal.getOrCreateInstance(hostingElement);

        serverElement.addEventListener(
            "hidden.bs.modal",
            function handler() {
                serverElement.removeEventListener("hidden.bs.modal", handler);

                hostingModal.show();
            },
            { once: true },
        );

        serverModal.hide();
    });

    /*
    |--------------------------------------------------------------------------
    | Save Hosting Account
    |--------------------------------------------------------------------------
    */

    $(document).on("submit", "#hostingAccountForm", function (e) {
        e.preventDefault();

        let form = $(this);

        $.ajax({
            url: "/optimization/hosting",

            type: "POST",

            data: form.serialize(),

            beforeSend: function () {
                form.find("button[type='submit']")
                    .prop("disabled", true)
                    .html('<i class="fas fa-spinner fa-spin"></i> Saving...');
            },

            success: function (response) {
                hostingModal.hide();

                Swal.fire({
                    icon: "success",

                    title: "Success",

                    text: response.message,

                    timer: 1800,

                    showConfirmButton: false,
                });

                setTimeout(function () {
                    serverModal.show();
                }, 300);
            },

            error: function (xhr) {
                let html = "";

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function (key, value) {
                        html += value[0] + "<br>";
                    });
                } else {
                    html = "Something went wrong.";
                }

                Swal.fire({
                    icon: "error",

                    title: "Validation Error",

                    html: html,
                });
            },

            complete: function () {
                form.find("button[type='submit']")
                    .prop("disabled", false)
                    .html(
                        '<i class="fas fa-save mr-1"></i> Save Hosting Account',
                    );
            },
        });
    });
});
