<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website SMAN 1 MONTONG</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="flipbook.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<?php include('../fitur/header.php'); ?>

<main>
    <?php include('../fitur/menu.php'); ?>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="IMAGES/tbg.jpg" alt="Slide 1">
    </div>
    <div class="item">
      <img src="IMAGES/tbg2.jpg" alt="Slide 2">
    </div>
    <div class="item">
      <img src="IMAGES/tbg2.png" alt="Slide 3">
    </div>
    <div class="item">
      <img src="IMAGES/header.png" alt="Slide 3">
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

    <section>
        <div class="bawah">
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
            <div class="container-konten">
            <?php include('../fitur/banner.php'); ?>
            <?php include('../fitur/sosmed.php'); ?>
                <!-- Kalender -->
                <?php include('../fitur/kalender.php'); ?>

                <!-- Slider Menu -->

                <?php include('../fitur/slide_menu.php'); ?>
            </div>
        </div>
    </section>

</main>
    
<footer>
    <p>© 2025 Sekolah Menengah Atas Negeri 1 Montong</p>
</footer>
<style>
   #myCarousel .carousel-inner > .item > img {
    width: 100%;
    height: auto;
  }
  #myCarousel .carousel-control {
    background-image: none !important;
    font-size: 40px;
    top: 50%;
    transform: translateY(-50%);
  }
    #prodetail {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      padding: 20px;
      gap: 10px;
      justify-content: center;
      align-items: center;
    }
    .s-pro-detail {
      flex: 1 1 400px;
      max-width: 600px;
      padding-top: 10px;
      width: 100%; /* tulisan memenuhi semua lebar */
      padding: 0 20px;
      box-sizing: border-box;
    }

    .s-pro-detail h6 {
      font-size: 14px;
      color: gray;
      margin-bottom: 5px;
    }

    .s-pro-detail h4 {
      font-size: 22px;
      margin: 10px 0;
    }

    .s-pro-detail h2 {
      font-size: 26px;
      color: #088178;
      margin-bottom: 20px;
    }

    .s-pro-detail select,
    .s-pro-detail input {
      padding: 10px;
      margin-right: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    .s-pro-detail input[type="number"] {
      width: 70px;
    }

    .s-pro-detail button {
      padding: 12px 25px;
      background-color: #088178;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      margin-bottom: 20px;
    }

    .s-pro-detail span {
      display: block;
      line-height: 1.6;
      color: #333;
    }

    /* Responsive */
    @media screen and (max-width: 768px) {
      #prodetail {
        flex-direction: column;
        padding: 20px;
      }

      .s-pro-img,
      .s-pro-detail {
        max-width: 100%;
      }
    }
</style>
<script src="flipbook.js"></script>
<script src="script.js"></script>
<script>
  // Script untuk mengganti gambar utama saat klik thumbnail
  const mainImage = document.getElementById("gmbrutm");
  const thumbnails = document.querySelectorAll(".gmb-clk-kol img");

  thumbnails.forEach((thumb) => {
    thumb.addEventListener("click", () => {
      mainImage.src = thumb.src;
    });
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js"></script>
<script>
  $(document).ready(function () {
    $('#myCarousel').carousel({
      interval: 5000,
      pause: "hover"
    });

    // Swipe functionality
    $("#myCarousel").swipe({
      swipe: function (event, direction) {
        if (direction === 'left') {
          $(this).carousel('next');
        } else if (direction === 'right') {
          $(this).carousel('prev');
        }
      },
      allowPageScroll: "vertical"
    });
  });
</script>
    
</body>
</html>