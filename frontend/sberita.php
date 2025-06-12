<?php 
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "sma";
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil ID berita dari URL
$id_berita = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_berita == 0) {
    die("ID berita tidak ditemukan.");
}

// Query untuk mengambil data berita berdasarkan ID
$sql = "SELECT id_berita, judul_berita, gambar_berita, isi_berita, tanggal_ditambahkan FROM berita WHERE id_berita = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_berita);
$stmt->execute();

// Bind hasil ke variabel
$stmt->bind_result($id_berita_db, $judul_berita, $gambar_berita, $isi_berita, $tanggal_ditambahkan);

if ($stmt->fetch()) {
    // Set zona waktu
    date_default_timezone_set('Asia/Jakarta');
    $tanggal_ditambahkan = date("d M Y", strtotime($tanggal_ditambahkan));
} else {
    echo "Berita tidak ditemukan.";
    exit;
}


$stmt->close();

// Ambil gambar tambahan dari tabel berita_gambar
$sql_gambar = "SELECT nama_file FROM gambar_berita WHERE id_berita = ?";
$stmt_gambar = $conn->prepare($sql_gambar);

if (!$stmt_gambar) {
    die("Prepare statement gagal: " . $conn->error);
}

$stmt_gambar->bind_param("i", $id_berita);

$stmt_gambar->execute();
$stmt_gambar->bind_result($nama_file);

$gambar_tambahan = array();
while ($stmt_gambar->fetch()) {
    $gambar_tambahan[] = $nama_file;
}
$stmt_gambar->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Produk</title>
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
      flex: 0 0 600px;
      max-width: 600px;
    }

    .s-pro-img img#gmbrutm {
      width: 100%;
      height: auto;
      max-height: 600px;
      object-fit: cover;
      border-radius: 10px;
    }

    .gmb-clk-grp {
      display: flex;
      justify-content: space-between;
      margin-top: 15px;
      gap: 10px;
      flex-wrap: wrap;
    }

    .gmb-clk-kol {
      flex: 1 1 22%;
      cursor: pointer;
    }

    .gmb-clk-kol img {
      width: 100%;
      border-radius: 5px;
      object-fit: cover;
      height: 70px;
    }

    .s-pro-detail {
      flex: 1 1 400px;
      max-width: 600px;
      padding-top: 10px;
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
</head>
<body>

<?php include('../fitur/header.php'); ?>

    <?php include('../fitur/menu.php'); ?>
<section id="prodetail">
  <!-- Gambar Produk -->
  <div class="s-pro-img">
  <img src="../backend/uploads/<?php echo htmlspecialchars($gambar_berita); ?>" id="gmbrutm" alt="Gambar Utama" />

  <div class="gmb-clk-grp">
  <?php foreach ($gambar_tambahan as $gambar): ?>
    <div class="gmb-clk-kol">
      <img src="../backend/uploads/<?php echo htmlspecialchars($gambar); ?>" alt="thumb" />
    </div>
  <?php endforeach; ?>
</div>

  </div>

  <!-- Detail Produk -->
  <div class="s-pro-detail">
  <h2><?php echo $judul_berita; ?></h2>
  <h6>Ditambahkan pada: <?php echo $tanggal_ditambahkan; ?></h6>
  <span>
  <?php echo nl2br(htmlspecialchars($isi_berita)); ?>
    </span>
  </div>
</section>

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

</body>
</html>
