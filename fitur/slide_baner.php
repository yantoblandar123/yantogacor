<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Carousel dengan Konten</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    #myCarousel .carousel-inner > .item > img {
      width: 100%;
      height: 70vh;
      object-fit: cover;
    }
    .carousel-caption-custom {
      position: absolute;
      top: 30%;
      left: 10%;
      color: white;
      text-align: left;
    }
    .carousel-caption-custom h1 {
      color: #FFD700;
      font-weight: bold;
    }
    .carousel-caption-custom button {
      margin-top: 15px;
      background-image: url("IMAGES/button1.jpg");
      background-color: transparent;
      color: #088178;
      border: 0;
      padding: 14px 80px 14px 65px;
      background-repeat: no-repeat;
      cursor: pointer;
      font-weight: 700;
      font-size: 15px;
    }
    #myCarousel .carousel-control {
      background-image: none !important;
      font-size: 40px;
      top: 50%;
      transform: translateY(-50%);
    }
  </style>
</head>
<body>

<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "sma");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data carousel
$sql = "SELECT id, judul, subjudul1, subjudul2, deskripsi, teks_tombol FROM carousel_slide";
$result = $conn->query($sql);

$carouselData = array(); // untuk menyimpan seluruh data slide

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id_carousel = (int)$row['id'];
        $gambarArray = array(); // untuk menyimpan semua gambar dari 1 slide

        // Ambil media yang terkait dari tabel carousel_media
        $gambarQuery = $conn->query("SELECT nama_media FROM carousel_media WHERE id_carousel = $id_carousel");

        if ($gambarQuery && $gambarQuery->num_rows > 0) {
            while ($img = $gambarQuery->fetch_assoc()) {
                $gambarArray[] = $img['nama_media'];
            }
        }

        $row['gambar'] = $gambarArray;
        $carouselData[] = $row;
    }
}
$conn->close();
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php foreach ($carouselData as $i => $item): ?>
      <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i === 0) ? 'active' : ''; ?>"></li>
    <?php endforeach; ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php foreach ($carouselData as $index => $item): 
      $gambarUtama = isset($item['gambar'][0]) ? $item['gambar'][0] : 'default.png';
    ?>
      <div class="item <?php echo ($index === 0) ? 'active' : ''; ?>">
        <img src="../backend/uploads/<?php echo htmlspecialchars($gambarUtama); ?>" alt="Slide Image" />
        <div class="carousel-caption-custom">
          <h4><?php echo nl2br(htmlspecialchars($item['judul'])); ?></h4>
          <h2><?php echo nl2br(htmlspecialchars($item['subjudul1'])); ?></h2>
          <h1><?php echo nl2br(htmlspecialchars($item['subjudul2'])); ?></h1>
          <p><?php echo nl2br(htmlspecialchars($item['deskripsi'])); ?></p>
          <a href="#"><button><?php echo nl2br(htmlspecialchars($item['teks_tombol'])); ?></button></a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js"></script>
<script>
  $(document).ready(function () {
    $('#myCarousel').carousel({
      interval: 5000,
      pause: "hover"
    });

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
