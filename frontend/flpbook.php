<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Flipbook Geser</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .book {
      width: 100%;
      max-width: 1000px;
      height: 1000px;
      border-radius: 10px;
      margin: 40px auto;
      position: relative;
      background: #fff;
      border: 1px solid #ccc;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      touch-action: pan-y;
    }

    .page {
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      padding: 20px;
      box-sizing: border-box;
      overflow-y: auto;
      display: none;
    }

    .page.active {
      display: block;
    }

    .navigation {
      position: absolute;
      bottom: 20px;
      width: 100%;
      display: flex;
      justify-content: space-between;
      padding: 0 30px;
      box-sizing: border-box;
      z-index: 10;
    }

    .navigation button {
      padding: 10px 20px;
      background-color: rgba(0, 0, 0, 0.6);
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .navigation button:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }
  </style>
</head>
<body>

  <div class="book" id="flipbook">
    <div class="page active">
      <h2>Halaman 1</h2>
      <p>Ini adalah halaman pertama.</p>
    </div>
    <div class="page">
      <h2>Halaman 2</h2>
      <p>Ini adalah halaman kedua.</p>
    </div>
    <div class="page">
      <h2>Halaman 3</h2>
      <p>Ini adalah halaman ketiga.</p>
    </div>
    <div class="page">
      <h2>Halaman 4</h2>
      <p>Ini adalah halaman keempat.</p>
    </div>

    <!-- Tombol Navigasi -->
    <div class="navigation">
      <button onclick="flipPrev()">← Sebelumnya</button>
      <button onclick="flipNext()">Berikutnya →</button>
    </div>
  </div>

  <script>
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
  </script>

</body>
</html>
