document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll(".slide-image");
    let currentIndex = 0;
    let slideInterval;

    function showImage(index) {
        images[currentIndex].classList.remove("active");
        currentIndex = index;
        images[currentIndex].classList.add("active");
    }

    function showNextImage() {
        showImage((currentIndex + 1) % images.length);
    }

    function showPreviousImage() {
        showImage((currentIndex - 1 + images.length) % images.length);
    }

    function startSlideShow() {
        slideInterval = setInterval(showNextImage, 3000);
    }

    function stopSlideShow() {
        clearInterval(slideInterval);
    }

    // Start slideshow on page load
    startSlideShow();

    // Stop slideshow on hover and resume on mouse leave
    const mainImageContainer = document.querySelector(".main-image-container");
    mainImageContainer.addEventListener("mouseenter", stopSlideShow);
    mainImageContainer.addEventListener("mouseleave", startSlideShow);

    // Add event listeners for manual navigation
    document.querySelector(".next").addEventListener("click", showNextImage);
    document.querySelector(".prev").addEventListener("click", showPreviousImage);
});
