// Text Carousel Animation
document.addEventListener('DOMContentLoaded', () => {
    const slideContainer = document.getElementById('carousel-host');
    const slides = document.querySelectorAll('template[name="carousel-slide"]');
    if (slides.length === 0) {
        console.error('No slides found for the carousel.');
        return;
    }

    let slideIndex = 0;

    function cycleSlides() {
        slideIndex = (slideIndex + 1 >= slides.length) ? 0 : slideIndex + 1;
        slideContainer.replaceChildren(slides[slideIndex].content.cloneNode(true));
    }

    setInterval(cycleSlides, 6000);
});