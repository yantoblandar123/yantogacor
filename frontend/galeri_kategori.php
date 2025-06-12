<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri Kategori | SMAN 1 MONTONG</title>
</head>
<body>

<?php include('../fitur/header.php'); ?>

<main>
  <?php include('../fitur/menu.php'); ?>

  <section>
    <div class="atas">
      <?php include('../fitur/banner.php'); ?>
      <div class="news">
        <?php include('../fitur/headline.php'); ?>
      </div>
      <?php include('../fitur/sosmed.php'); ?>
    </div>

    <div class="bawah">
      <div class="news">
        <?php
        $kategori = isset($_GET['kategori']) ? intval($_GET['kategori']) : 0;
        ?>
        <h1>GALERI SMAN 1 MONTONG<?php echo $kategori ? ": Kategori " . htmlspecialchars($kategori) : ""; ?></h1>

        <section id="produk" class="section-p1">
          <div class="pro-container">
          <?php
          // Koneksi DB
          $conn = new mysqli("localhost", "root", "", "sma");
          if ($conn->connect_error) {
              die("Koneksi database gagal: " . $conn->connect_error);
          }

          if ($kategori > 0) {
              $sql = "SELECT * FROM info WHERE id_kategori = $kategori";
              $result = $conn->query($sql);

              if ($result && $result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $id_info = $row['id_info'];
                      $nama_kegiatan = $row['nama_kegiatan'];
                      $tanggal_kegiatan = $row['tanggal_kegiatan'];

                      $media = 'default.png'; // default image
                      $mediaQuery = $conn->query("SELECT media_path FROM info_media WHERE id_info = $id_info AND jenis_media = 'foto' LIMIT 1");

                      if ($mediaQuery && $mediaQuery->num_rows > 0) {
                          $mediaRow = $mediaQuery->fetch_assoc();
                          $mediaPath = basename(trim($mediaRow['media_path'])); // keamanan

                          // Path relatif dari file PHP ini ke folder uploads
                          $uploadsPath = __DIR__ . '/../backend/uploads/' . $mediaPath;

                          if (!empty($mediaPath) && file_exists($uploadsPath)) {
                              $media = $mediaPath;
                          }
                      }

                      echo '
                      <div class="pro" onclick="window.location.href=\'sgaleri.php?id=' . $id_info . '\'">
                          <img src="../backend/uploads/' . htmlspecialchars($media) . '" 
                               alt="' . htmlspecialchars($nama_kegiatan) . '" 
                               onerror="this.onerror=null;this.src=\'../backend/uploads/default.png\';">
                          <div class="des">
                              <h4>' . htmlspecialchars($nama_kegiatan) . '</h4>
                              <h5>' . htmlspecialchars($tanggal_kegiatan) . '</h5>
                          </div>
                      </div>';
                  }
              } else {
                  echo "<p>Tidak ada data untuk kategori ini.</p>";
              }
          } else {
              echo "<p>Kategori tidak valid atau tidak diberikan.</p>";
          }

          $conn->close();
          ?>
          </div>
        </section>
      </div>

      <div class="container-konten">
        <?php include('../fitur/kalender.php'); ?>
        <?php include('../fitur/slide_menu.php'); ?>
      </div>
    </div>
  </section>
</main>

<footer>
  <p>© 2025 Sekolah Menengah Atas Negeri 1 Montong</p>
</footer>

<!-- CSS: Tetap -->
<style>
#produk {
    text-align: center;
}

#produk .pro-container {
    display: flex;
    justify-content: space-between;
    padding-top: 20px;
    flex-wrap: wrap;
}

#produk .pro {
    width: 23%;
    min-width: 30px;
    padding: 10px 12px;
    border: 1px solid #cce7d0;
    border-radius: 25px;
    cursor: pointer;
    box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.02);
    margin: 15px 0;
    transition: 0.2s ease;
    position: relative;
}

#produk .pro:hover {
    box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.06);
}

#produk .pro img {
    width: 100%;
    border-radius: 20px;
}

#produk .pro .des {
    text-align: start;
    padding: 10px 0;
}

#produk .pro .des h5 {
    padding-left: 7px;
    color: #1a1a1a;
    font-size: 14px;
}

#produk .pro .des h4 {
    padding-top: 7px;
    font-size: 15px;
    font-weight: 700;
    color: #088178;
}
</style>

<script src="script.js"></script>
</body>
</html>
