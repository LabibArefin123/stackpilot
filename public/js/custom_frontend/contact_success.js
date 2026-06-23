document.addEventListener("DOMContentLoaded", function () {
    // Check if contact success data exists
    if (window.contactSuccess) {
        const successData = window.contactSuccess;

        Swal.fire({
            icon: "success",
            title: "Request Submitted",
            html: `
                <p>You have submitted <b>${successData.count}</b> time(s).</p>
                <small>Last submitted at<br>${successData.time}</small>
            `,
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
    }
});
