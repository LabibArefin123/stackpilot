document.addEventListener("DOMContentLoaded", function () {
    const phoneLink = document.querySelector(".phone-link");
    if (phoneLink) {
        // Get the number text
        let number = phoneLink.textContent.trim();

        // Remove any non-digit characters
        number = number.replace(/\D/g, "");

        // Add Bangladesh country code (assuming it's Dhaka landline, 02)
        // For mobile you could use 880 instead
        // Here 02 -> 8802
        if (number.length === 9 && number.startsWith("2")) {
            // Dhaka landline 9-digit
            number = "880" + number;
        }

        // Set href for click-to-call
        phoneLink.href = "tel:+" + number;

        // Optional: Add title
        phoneLink.title = "Call this number";
    }
});
