function openProblemModal() {
    document.getElementById("problemModal").classList.add("show");
}

function closeProblemModal() {
    document.getElementById("problemModal").classList.remove("show");
}

// Close when clicking outside
document.getElementById("problemModal").addEventListener("click", function (e) {
    if (e.target === this) {
        closeProblemModal();
    }
});
