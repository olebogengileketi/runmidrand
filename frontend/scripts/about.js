
document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(track.children);
    const nextButton = document.querySelector('.next-btn');
    const prevButton = document.querySelector('.prev-btn');
    
    const slideWidth = slides[0].getBoundingClientRect().width;
    
    
    slides.forEach((slide, index) => {
        slide.style.left = (slideWidth + 30) * index + 'px'; 
    });
    
    
    const moveToSlide = (track, currentSlide, targetSlide) => {
        track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
        currentSlide.classList.remove('current-slide');
        targetSlide.classList.add('current-slide');
    }
    
    
    const hideShowArrows = (slides, prevButton, nextButton, targetIndex) => {
        if (targetIndex === 0) {
            prevButton.style.display = 'none';
            nextButton.style.display = 'flex';
        } else if (targetIndex === slides.length - 1) {
            prevButton.style.display = 'flex';
            nextButton.style.display = 'none';
        } else {
            prevButton.style.display = 'flex';
            nextButton.style.display = 'flex';
        }
    }
    
    
    prevButton.addEventListener('click', function() {
        const currentSlide = track.querySelector('.current-slide');
        const prevSlide = currentSlide.previousElementSibling;
        const prevIndex = slides.findIndex(slide => slide === prevSlide);
        
        moveToSlide(track, currentSlide, prevSlide);
        hideShowArrows(slides, prevButton, nextButton, prevIndex);
    });
    
    
    nextButton.addEventListener('click', function() {
        const currentSlide = track.querySelector('.current-slide');
        const nextSlide = currentSlide.nextElementSibling;
        const nextIndex = slides.findIndex(slide => slide === nextSlide);
        
        moveToSlide(track, currentSlide, nextSlide);
        hideShowArrows(slides, prevButton, nextButton, nextIndex);
    });
    
    
    slides[0].classList.add('current-slide');
    hideShowArrows(slides, prevButton, nextButton, 0);
});


function animateCounter() {
  const counters = document.querySelectorAll('.stat-number');
  const speed = 200; 
  
  counters.forEach(counter => {
    const target = +counter.getAttribute('data-count');
    const count = +counter.innerText;
    const increment = Math.ceil(target / speed);
    
    if (count < target) {
      counter.innerText = Math.min(count + increment, target);
      setTimeout(() => animateCounter(counter), 1);
    }
  });
}


const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      animateCounter();
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.5 });


const statsSection = document.querySelector('.stats-section');
if (statsSection) {
  observer.observe(statsSection);
}