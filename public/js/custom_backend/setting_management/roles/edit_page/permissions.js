document.addEventListener("DOMContentLoaded", function () {
    /*
    |--------------------------------------------------------------------------
    | Global Select All
    |--------------------------------------------------------------------------
    */

    const selectAll = document.getElementById("selectAllPermissions");

    if (selectAll) {
        selectAll.addEventListener("click", function () {
            document.querySelectorAll(".perm-all").forEach(function (checkbox) {
                checkbox.checked = true;
            });

            toastr.success("All permissions selected.");
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Global Unselect All
    |--------------------------------------------------------------------------
    */

    const unselectAll = document.getElementById("unselectAllPermissions");

    if (unselectAll) {
        unselectAll.addEventListener("click", function () {
            document.querySelectorAll(".perm-all").forEach(function (checkbox) {
                checkbox.checked = false;
            });

            toastr.warning("All permissions unselected.");
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Group Select
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll(".select-all-btn").forEach(function (button) {
        button.addEventListener("click", function () {
            const group = this.dataset.group;

            document
                .querySelectorAll(".perm-" + group)
                .forEach(function (checkbox) {
                    checkbox.checked = true;
                });

            toastr.success(group.toUpperCase() + " permissions selected.");
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Group Unselect
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll(".unselect-all-btn").forEach(function (button) {
        button.addEventListener("click", function () {
            const group = this.dataset.group;

            document
                .querySelectorAll(".perm-" + group)
                .forEach(function (checkbox) {
                    checkbox.checked = false;
                });

            toastr.warning(group.toUpperCase() + " permissions unselected.");
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Live Counter
    |--------------------------------------------------------------------------
    */

    const checkboxes = document.querySelectorAll(".perm-all");

    const updateCounter = function () {
        const checked = document.querySelectorAll(".perm-all:checked").length;

        const total = checkboxes.length;

        const counter = document.getElementById("permissionCounter");

        if (counter) {
            counter.innerHTML = checked + " / " + total;
        }
    };

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener("change", updateCounter);
    });

    updateCounter();
});
