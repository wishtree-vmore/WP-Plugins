var slideIndex = 0;
var progressInterval;
var progressBarContainer;

function showSlides() {
    var slides = document.getElementsByClassName("slide");
    progressBarContainer = document.querySelector(".progress-bar-container");

    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    slides[slideIndex - 1].style.display = "block";

    // Update progress bar
    clearInterval(progressInterval);
    updateProgressBar(slides.length);

    // Set the timeout for the next slide
    progressInterval = setTimeout(showSlides, 2000); // Change 2000 to your desired interval in milliseconds (2 seconds in this example)
}

function updateProgressBar(totalSlides) {
    progressBarContainer.innerHTML = ""; // Clear previous progress bar

    for (var i = 0; i < totalSlides; i++) {
        var dot = document.createElement("span");
        dot.className = "progress-dot";
        progressBarContainer.appendChild(dot);
    }

    var activeDot = progressBarContainer.querySelectorAll(".progress-dot")[slideIndex - 1];
    activeDot.classList.add("active");
}

document.addEventListener("DOMContentLoaded", function() {
    showSlides();
});
