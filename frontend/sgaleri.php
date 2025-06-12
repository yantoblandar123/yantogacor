<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Kegiatan | SMAN 1 MONTONG</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    #prodetail {
      display: flex;
      flex-wrap: wrap;
      padding: 40px;
      gap: 30px;
      justify-content: center;
      align-items: flex-start;
    }

    .s-pro-img {
      flex: 0 0 400px;
      max-width: 400px;
    }

    .s-pro-img img#gmbrutm {
      width: 100%;
      height: auto;
      max-height: 400px;
      object-fit: cover;
      border-radius: 10px;
    }

    .gmb-clk-grp {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 15px;
    }

    .gmb-clk-kol {
      flex: 1 1 22%;
      cursor: pointer;
    }

    .gmb-clk-kol img {
      width: 100%;
      height: 70px;
      object-fit: cover;
      border-radius: 5px;
    }

    .s-pro-detail {
      flex: 1 1 400px;
      max-width: 600px;
      padding-top: 10px;
    }

    .s-pro-detail h2 {
      font-size: 26px;
      color: #088178;
      margin-bottom: 10px;
    }

    .s-pro-detail h4 {
      font-size: 18px;
      margin-bottom: 8px;
    }

    .s-pro-detail span {
      display: block;
      line-height: 1.6;
      color: #333;
    }

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
</head>
<body>

<?php include('../fitur/header.php'); ?>
<?php include('../fitur/menu.php'); ?>

<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "sma");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id_info = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id_info <= 0) {
    echo "<p>ID kegiatan tidak valid.</p>";
    exit;
}

// Ambil data kegiatan
$stmt = $conn->prepare("SELECT nama_kegiatan, deskripsi, tanggal_kegiatan, waktu_kegiatan, lokasi_kegiatan FROM info WHERE id_info = ?");
$stmt->bind_param("i", $id_info);
$stmt->execute();
$stmt->bind_result($nama_kegiatan, $deskripsi, $tanggal_kegiatan, $waktu_kegiatan, $lokasi_kegiatan);
if (!$stmt->fetch()) {
    echo "<p>Data kegiatan tidak ditemukan.</p>";
    exit;
}
$stmt->close();

// Ambil semua media foto dari info_media
$gambarArray = array();
$mediaResult = $conn->query("SELECT media_path FROM info_media WHERE id_info = $id_info AND jenis_media = 'foto'");
if ($mediaResult && $mediaResult->num_rows > 0) {
    while ($row = $mediaResult->fetch_assoc()) {
        $path = basename($row['media_path']); // Hindari path traversal
        $fullPath = realpath(__DIR__ . '/../backend/uploads/' . $path);
        if ($fullPath && file_exists($fullPath)) {
            $gambarArray[] = $path;
        }
    }
}
$conn->close();

// Gambar utama fallback
$gambarUtama = count($gambarArray) > 0 ? $gambarArray[0] : 'default.png';
?>

<section id="prodetail">
  <div class="s-pro-img">
    <img src="../backend/uploads/<?php echo htmlspecialchars($gambarUtama); ?>" id="gmbrutm" alt="Gambar Utama" 
         onerror="this.onerror=null;this.src='../backend/uploads/default.png';"/>

    <div class="gmb-clk-grp">
      <?php foreach ($gambarArray as $gambar): ?>
        <div class="gmb-clk-kol">
          <img src="../backend/uploads/<?php echo htmlspecialchars($gambar); ?>" alt="Thumb" 
               onerror="this.onerror=null;this.src='../backend/uploads/default.png';" />
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="s-pro-detail">
    <h2><?php echo htmlspecialchars($nama_kegiatan); ?></h2>
    <h4>Tanggal: <?php echo htmlspecialchars($tanggal_kegiatan); ?></h4>
    <h4>Waktu: <?php echo htmlspecialchars($waktu_kegiatan ?: '-'); ?></h4>
    <h4>Lokasi: <?php echo htmlspecialchars($lokasi_kegiatan ?: '-'); ?></h4>
    <h4>Deskripsi:</h4>
    <span><?php echo nl2br(htmlspecialchars($deskripsi)); ?></span>
  </div>
</section>

<script>
  var mainImage = document.getElementById("gmbrutm");
  var thumbnails = document.querySelectorAll(".gmb-clk-kol img");

  thumbnails.forEach(function(thumb) {
    thumb.addEventListener("click", function() {
      mainImage.src = this.src;
    });
  });
</script>

</body>
</html>
