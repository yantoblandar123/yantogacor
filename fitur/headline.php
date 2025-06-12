<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Berita Carousel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <style>
    #beritaCarousel {
      width: 100%;
      margin-top: 20px;
    }

    #beritaCarousel .carousel-inner > .item {
      padding: 0;
      background: none;
    }

    .slide-content {
      display: flex;
      align-items: center;
      padding: 10px 0;
    }

    .slide-content img {
      width: 120px;
      height: auto;
      margin-right: 15px;
      border-radius: 5px;
    }

    .berita-judul {
      font-size: 18px;
      font-weight: bold;
      color: #333;
    }

    .berita-tanggal {
      font-size: 14px;
      color: #666;
    }

    #beritaCarousel .carousel-control,
    #beritaCarousel .carousel-indicators {
      display: none !important;
    }

    @media (max-width: 576px) {
      .slide-content {
        flex-direction: column;
        align-items: flex-start;
      }

      .slide-content img {
        margin-bottom: 10px;
      }
    }
  </style>
</head>
<body>

<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "sma"; // Ganti dengan nama database Anda
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM berita ORDER BY tanggal_ditambahkan DESC LIMIT 10";
$result = $conn->query($sql);
?>

<div id="beritaCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
  <div class="carousel-inner">
  <?php
    date_default_timezone_set('Asia/Jakarta'); 
    $active = true;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Mengambil id_berita untuk digunakan di URL
            $id_berita = $row["id_berita"];
            echo '<div class="item ' . ($active ? 'active' : '') . '" >';
            echo '  <div class="slide-content">';
            echo '    <img src="../backend/uploads/' . htmlspecialchars($row["gambar_berita"]) . '" alt="Gambar">';
            echo '    <div>';
            // Membuat judul berita sebagai link
            echo '      <div class="berita-judul"><a href="../frontend/sberita.php?id_berita=' . $id_berita . '">' . htmlspecialchars($row["judul_berita"]) . '</a></div>';
            echo '      <div class="berita-tanggal">' . date("d M Y", strtotime($row["tanggal_ditambahkan"])) . '</div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
            $active = false;
        }
    } else {
        echo '<div class="item active"><div class="slide-content"><div>Tidak ada berita</div></div></div>';
    }
?>
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js"></script>

<script>
  $(document).ready(function () {
    $('#beritaCarousel').carousel({
      interval: 5000,
      pause: false
    });

    // Aktifkan swipe
    $("#beritaCarousel").on("touchstart", function (event) {
      var xClick = event.originalEvent.touches[0].pageX;
      $(this).one("touchmove", function (event) {
        var xMove = event.originalEvent.touches[0].pageX;
        if (Math.floor(xClick - xMove) > 5) {
          $(this).carousel('next');
        } else if (Math.floor(xClick - xMove) < -5) {
          $(this).carousel('prev');
        }
      });
      $(this).on("touchend", function () {
        $(this).off("touchmove");
      });
    });
  });
</script>

</body>
</html>
