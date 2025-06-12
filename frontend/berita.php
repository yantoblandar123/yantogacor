<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website SMAN 1 MONTONG</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menu.css">
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
            <div class="opini">
            <h1>BERITA</h1>
                    <section id="produk" class="section-p1">
        <div class="pro-container">
        <?php
$conn = new mysqli("localhost", "root", "", "sma");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM berita ORDER BY tanggal_ditambahkan DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($berita = $result->fetch_assoc()) {
        $id = $berita['id_berita'];
        $judul = $berita['judul_berita'];
        $tanggal = date("d M Y", strtotime($berita['tanggal_ditambahkan']));
        $gambarUtama = $berita['gambar_berita'];

        echo "<div class='pro' onclick=\"window.location.href='sberita.php?id=$id';\">";

        // Gambar utama
        if (!empty($gambarUtama) && file_exists("../backend/uploads/" . $gambarUtama)) {
            echo '<img src="../backend/uploads/' . htmlspecialchars($gambarUtama) . '" alt="Gambar Berita">';
        } else {
            echo "<img src='../frontend/IMAGES/default.png' alt='Gambar Default'>";
        }

        echo "<div class='des'>";
        echo "<h4>$judul</h4>";
        echo "<span>$tanggal</span>";
        echo "</div>"; // .des
        echo "</div>"; // .pro
    }
} else {
    echo "<p>Tidak ada berita tersedia.</p>";
}

$conn->close();
?>

        </div>
    </section>
            </div>
            <div class="container-konten">
                <!-- Kalender -->
                <?php include('../fitur/kalender.php'); ?>

                <!-- Slider Menu -->

                <?php include('../fitur/slide_menu.php'); ?>
            </div>
        </div>
    </section>

</main>
<style>
.opini {
    height: 650px;
    overflow-y: auto;
    padding: 0 20px 20px 20px; /* padding atas dihilangkan */
    box-sizing: border-box;
    border: 1px solid #ccc;
    background-color: #fff;
    position: relative;
    margin-top: 20px; /* Tambahan ini menggeser opini ke bawah */
}

.opini h1 {
    position: sticky;
    top: 0;
    background-color: #fff; /* atau warna sesuai desain */
    padding: 20px 0;
    margin: 0; /* hilangkan margin bawaan */
    z-index: 10;
    border-bottom: 1px solid #ccc;
    width: 100%; /* pastikan lebar penuh */
}

        #produk {
    text-align: center;
    margin-top: 0;
}

#produk .pro-container {
    display: flex;
    flex-direction: column; /* Menata produk secara vertikal */
    align-items: center; /* Mengatur produk agar terpusat di tengah */
    padding-top: 20px;
}

#produk .pro {
    width: 100%; /* Memastikan produk mengambil lebar penuh */
    max-width: 800px; /* Membatasi lebar produk agar tidak terlalu lebar */
    display: flex;
    justify-content: flex-start; /* Menyusun gambar dan deskripsi secara horizontal */
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
    width: 150px; /* Ukuran gambar diatur agar tidak terlalu besar */
    height: auto;
    border-radius: 20px;
    margin-right: 15px; /* Memberikan jarak antara gambar dan deskripsi */
}

#produk .pro .des {
    display: flex;
    flex-direction: column; /* Deskripsi disusun secara vertikal */
    justify-content: center; /* Memastikan deskripsi terpusat */
    text-align: start;
}

#produk .pro .des span {
    color: #606063;
    font-size: 12px;
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
<footer>
    <p>© 2025 Sekolah Menengah Atas Negeri 1 Montong</p>
</footer>

<script src="script.js"></script>
    
</body>
</html>
