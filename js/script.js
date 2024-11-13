// Function to handle scroll animations
function animateOnScroll() {
    // Get all elements with the class 'animate-on-scroll'
    const scrollElements = document.querySelectorAll('.animate-on-scroll');

    scrollElements.forEach((el) => {
        const elementPosition = el.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        // If the element is within the viewport, add the 'active' class
        if (elementPosition < windowHeight - 100) {
            el.classList.add('active');
        }
    });
}

// Listen to the scroll event
window.addEventListener('scroll', animateOnScroll);
