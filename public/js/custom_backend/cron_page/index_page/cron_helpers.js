const CronHelper = {
    csrf() {
        return $('meta[name="csrf-token"]').attr("content");
    },

    loading(title = "Please wait...") {
        Swal.fire({
            title: title,

            allowOutsideClick: false,

            didOpen: () => {
                Swal.showLoading();
            },
        });
    },

    close() {
        Swal.close();
    },

    success(message) {
        Swal.fire({
            icon: "success",

            title: "Success",

            text: message,
        });
    },

    error(message) {
        Swal.fire({
            icon: "error",

            title: "Error",

            text: message,
        });
    },
};
