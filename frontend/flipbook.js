
let currentPage = 0;
const pages = document.querySelectorAll('.page');
const totalPages = pages.length;

function updateFlipbook() {
  pages.forEach((page, index) => {
    page.classList.remove('active');
  });
  pages[currentPage].classList.add('active');
}

function flipNext() {
  currentPage = (currentPage + 1) % totalPages;
  updateFlipbook();
}

function flipPrev() {
  currentPage = (currentPage - 1 + totalPages) % totalPages;
  updateFlipbook();
}

// Swipe Gesture Support
const book = document.getElementById('flipbook');
let startX = 0;
let endX = 0;

// Touch for mobile
book.addEventListener('touchstart', (e) => {
  startX = e.touches[0].clientX;
});

book.addEventListener('touchend', (e) => {
  endX = e.changedTouches[0].clientX;
  handleSwipe();
});

// Mouse for desktop
book.addEventListener('mousedown', (e) => {
  startX = e.clientX;
});

book.addEventListener('mouseup', (e) => {
  endX = e.clientX;
  handleSwipe();
});

function handleSwipe() {
  const threshold = 50;
  if (startX - endX > threshold) {
    flipNext(); // Geser ke kiri
  } else if (endX - startX > threshold) {
    flipPrev(); // Geser ke kanan
  }
}