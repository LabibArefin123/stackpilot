document.addEventListener("DOMContentLoaded", function () {
    const faqCards = document.querySelectorAll(".faq-card");

    faqCards.forEach((card) => {
        const btn = card.querySelector(".faq-toggle");

        btn.addEventListener("click", () => {
            card.classList.toggle("active");
        });
    });
});
