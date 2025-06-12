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
$id_guru = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_guru == 0) {
    die("ID berita tidak ditemukan.");
}

// Query untuk mengambil data berita berdasarkan ID
$sql = "SELECT id_guru, nama, nip, posisi, jenis_kelamin, mulai_menjabat, periode_menjabat, biodata, tempat_lahir, tanggal_lahir FROM guru WHERE id_guru = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_guru);
$stmt->execute();

// Bind hasil ke variabel
$stmt->bind_result($id_guru_db, $nama, $nip, $posisi, $jenis_kelamin, $mulai_menjabat, $periode_menjabat, $biodata, $tempat_lahir, $tanggal_lahir);

if ($stmt->fetch()) {
  
}
$stmt->close();

$gambarQuery = mysqli_query($conn, "SELECT nama_file FROM guru_gambar WHERE id_guru = $id_guru");
$gambarArray = array();  // Inisialisasi array untuk menampung gambar

while ($img = mysqli_fetch_assoc($gambarQuery)) {
    $gambarArray[] = $img['nama_file']; // Menambahkan nama file gambar ke array
}

$gambarUtama = isset($gambarArray[0]) ? $gambarArray[0] : 'default.png';  // Gambar utama jika tidak ada gambar
$conn->close();
?>

<section id="prodetail">
  <div class="s-pro-img">
    <img src="../backend/uploads/<?php echo htmlspecialchars($gambarUtama); ?>" id="gmbrutm" alt="Gambar Utama" />

    <div class="gmb-clk-grp">
      <?php foreach ($gambarArray as $gambar) : ?>
        <div class="gmb-clk-kol">
          <img src="../backend/uploads/<?php echo htmlspecialchars($gambar); ?>" alt="thumb" />
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="s-pro-detail">
    <h6>Posisi: <?php echo nl2br(htmlspecialchars($posisi)); ?></h6>
    <h4>Nama: <?php echo nl2br(htmlspecialchars($nama)); ?></h4>
    <h4>NIP: <?php echo nl2br(htmlspecialchars($nip)); ?></h4>
    <h4>Tempat Tanggal Lahir: <?php echo nl2br(htmlspecialchars($tempat_lahir)); ?>,<?php echo nl2br(htmlspecialchars($tanggal_lahir)); ?></h4>
    <h4>Jenis Kelamin: <?php echo nl2br(htmlspecialchars($jenis_kelamin)); ?></h4>
    <h4>Mulai Menjabat: <?php echo nl2br(htmlspecialchars($mulai_menjabat)); ?></h4>
    <h4>Periode Menjabat: <?php echo nl2br(htmlspecialchars($periode_menjabat)); ?></h4>
    <h2>Biodata</h2>
    <span><?php echo nl2br(htmlspecialchars($biodata)); ?></span>
  </div>
</section>


<script>
  const mainImage = document.getElementById("gmbrutm");
  const thumbnails = document.querySelectorAll(".gmb-clk-kol img");

  thumbnails.forEach((thumb) => {
    thumb.addEventListener("click", () => {
      mainImage.src = thumb.src;
    });
  });
</script>

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