document.addEventListener("DOMContentLoaded", function () {
    /*
    |--------------------------------------------------------------------------
    | Scroll To New Permissions
    |--------------------------------------------------------------------------
    */

    const showButton = document.getElementById("showNewPermissions");

    if (showButton) {
        showButton.addEventListener("click", function () {
            const firstPermission = document.querySelector(".new-permission");

            if (!firstPermission) {
                toastr.info("No new permissions found.");

                return;
            }

            firstPermission.scrollIntoView({
                behavior: "smooth",

                block: "center",
            });

            /*
            |--------------------------------------------------------------------------
            | Highlight
            |--------------------------------------------------------------------------
            */

            firstPermission.classList.add("border");

            firstPermission.classList.add("border-warning");

            firstPermission.classList.add("rounded");

            firstPermission.classList.add("p-2");

            setTimeout(function () {
                firstPermission.classList.remove("border");

                firstPermission.classList.remove("border-warning");

                firstPermission.classList.remove("rounded");

                firstPermission.classList.remove("p-2");
            }, 3000);

            toastr.success("Showing newly added permissions.");
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Highlight Every New Permission
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll(".new-permission").forEach(function (permission) {
        permission.addEventListener("mouseenter", function () {
            permission.classList.add("bg-warning");

            permission.classList.add("text-dark");
        });

        permission.addEventListener("mouseleave", function () {
            permission.classList.remove("bg-warning");

            permission.classList.remove("text-dark");
        });
    });
});
