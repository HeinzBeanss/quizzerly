const slider = document.querySelector('.slider');
const slides = document.querySelector('.slides');
const slideWidth = document.querySelector('.slide').clientWidth;
const numVisibleSlides = 6;
let currentSlide = 0;

function moveToNextSlide() {
    currentSlide = (currentSlide + 1) % slides.children.length;

    // Check if we are 5 slides away from the end and reset
    if (currentSlide > slides.children.length - 6) {
        currentSlide = 0;
    }

    slides.style.transform = `translateX(-${currentSlide * (slideWidth + 20)}px)`;
}

setInterval(moveToNextSlide, 2500);