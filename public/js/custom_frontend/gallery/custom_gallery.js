const thumbnails = document.querySelectorAll(".thumbnail img");
const previewImage = document.getElementById("preview-image");
const previewTitle = document.getElementById("preview-title");
const thumbnailBoxes = document.querySelectorAll(".thumbnail");

let currentIndex = 0;
const totalImages = thumbnails.length;

// Initialize first active thumbnail
thumbnailBoxes[currentIndex].classList.add("active");

// Function to show image by index
function showImage(index) {
    // Remove old active
    thumbnailBoxes.forEach((box) => box.classList.remove("active"));

    // Animate fade out
    previewImage.style.opacity = 0;
    previewTitle.style.opacity = 0;

    setTimeout(() => {
        previewImage.src = thumbnails[index].src;
        previewTitle.textContent = thumbnails[index].alt;

        // Animate fade in
        previewImage.style.opacity = 1;
        previewTitle.style.opacity = 1;

        // Set new active thumbnail
        thumbnailBoxes[index].classList.add("active");
        currentIndex = index;
    }, 300);
}

// Thumbnail click
thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener("click", () => {
        showImage(index);
    });
});

// Navigation buttons
document.querySelector(".left-btn").addEventListener("click", () => {
    let index = (currentIndex - 1 + totalImages) % totalImages;
    showImage(index);
});

document.querySelector(".right-btn").addEventListener("click", () => {
    let index = (currentIndex + 1) % totalImages;
    showImage(index);
});

// Autoplay slider every 3 seconds
setInterval(() => {
    let index = (currentIndex + 1) % totalImages;
    showImage(index);
}, 15000);
