<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PROFIL ALUMNI SMAN 1 MONTONG</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="menu.css">
  <style>
    .slider-wrapper {
        position: relative;
        width: 400px;
        height: 250px;
        overflow: hidden;
        background-color: #ffffff;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    }

    .slider-container {
        height: 100%;
        position: relative;
    }

    .custom-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
        z-index: 0;
        pointer-events: none;
    }

    .custom-slide.active {
        opacity: 1;
        transform: translateY(0);
        z-index: 1;
        pointer-events: auto;
    }

    .kotak {
        width: 100%;
        height: 100%;
        background: #e0e0e0;
        border-radius: 10px;
        padding: 10px;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }

    .kotak img {
        max-width: 80px;
        height: auto;
        margin-bottom: 10px;
    }

    .kotak h1 {
        font-size: 18px;
        color: #333;
        margin: 0;
    }

    .nav-button {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        background-color: #ddd;
        border: none;
        border-radius: 50%;
        padding: 8px 12px;
        cursor: pointer;
        z-index: 2;
    }

    .nav-button.atas {
        top: 5px;
    }

    .nav-button.bawah {
        bottom: 5px;
    }
  </style>
</head>
<body>

<!-- SLIDER KEDUA -->
<div class="slider-wrapper" id="customSlider">
  <div class="slider-container">
    <div class="custom-slide active">
      <div class="kotak" onclick="window.location.href='berita.php';">
        <img src="IMAGES/berita.png" alt="">
        <h1>Berita</h1>
      </div>
    </div>
    <div class="custom-slide">
      <div class="kotak" onclick="window.location.href='galeri.php';">
        <img src="IMAGES/galeri.png" alt="">
        <h1>Galeri</h1>
      </div>
    </div>
    <div class="custom-slide">
      <div class="kotak" onclick="window.location.href='guru.php';">
        <img src="IMAGES/guru.png" alt="">
        <h1>Data Guru</h1>
      </div>
    </div>
    <div class="custom-slide">
      <div class="kotak" onclick="window.location.href='denah.php';">
        <img src="IMAGES/denah.png" alt="">
        <h1>Denah Lokasi</h1>
      </div>
    </div>
  </div>

  <!-- Tombol Navigasi Slider -->
  <button id="prev-custom-slide" class="nav-button atas">⬆️</button>
  <button id="next-custom-slide" class="nav-button bawah">⬇️</button>
</div>

<!-- SCRIPT SLIDER -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll('#customSlider .custom-slide');
    let currentSlide = 0;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.remove('active');
      });
      slides[index].classList.add('active');
    }

    document.getElementById('prev-custom-slide').addEventListener('click', () => {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(currentSlide);
    });

    document.getElementById('next-custom-slide').addEventListener('click', () => {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    });
  });
</script>

</body>
</html>
