"use strict";

$(function () {
    function disableSections() {
        $("#domain-section").hide();

        $("#subfolder-section").hide();

        $("#local-section").hide();

        $(".install-arrow").hide();
    }

    disableSections();

    $("#project_id").change(function () {
        if ($(this).val() != "") {
            $("input[name=install_type]:checked").trigger("change");
        } else {
            disableSections();
        }
    });

    $("input[name=install_type]").change(function () {
        disableSections();

        let value = $(this).val();

        if (value == "domain") {
            $("#domain-section").slideDown(250);

            $(this)
                .closest(".install-method-card")
                .find(".install-arrow")
                .show();
        }

        if (value == "subfolder") {
            $("#subfolder-section").slideDown(250);

            $(this)
                .closest(".install-method-card")
                .find(".install-arrow")
                .show();
        }

        if (value == "local") {
            $("#local-section").slideDown(250);

            $(this)
                .closest(".install-method-card")
                .find(".install-arrow")
                .show();
        }
    });
});
