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
        <div class="news">
            <h1>GALERI SMAN 1 MONTONG</h1>

            <section id="produk" class="section-p1">
                <div class="pro-container">
                <?php
                    $host = "localhost";
                    $user = "root";
                    $password = "";
                    $database = "sma";

                    $koneksi = mysqli_connect($host, $user, $password, $database);
                    if (!$koneksi) {
                        die("Koneksi database gagal: " . mysqli_connect_error());
                    }

                    $kategoriQuery = mysqli_query($koneksi, "SELECT id_kategori, nama_kategori, gambar_kategori FROM kategori_kegiatan");
                    if (!$kategoriQuery || mysqli_num_rows($kategoriQuery) === 0) {
                        echo "<p>Tidak ada kategori kegiatan ditemukan.</p>";
                    } else {
                        while ($row = mysqli_fetch_assoc($kategoriQuery)) {
                            $id_kategori = $row['id_kategori'];
                            $nama_kategori = $row['nama_kategori'];
                            $gambar_kategori = !empty($row['gambar_kategori']) ? $row['gambar_kategori'] : 'default.png';

                            // Hitung jumlah info pada kategori ini
                            $jumlahInfoQuery = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM info WHERE id_kategori = $id_kategori");
                            $jumlahInfoData = mysqli_fetch_assoc($jumlahInfoQuery);
                            $jumlahInfo = $jumlahInfoData['jumlah'];

                            ?>
                            <div class="pro" onclick="window.location.href='galeri_kategori.php?kategori=<?php echo urlencode($id_kategori); ?>';">
                                <img src="../backend/uploads/<?php echo htmlspecialchars($gambar_kategori); ?>" alt="<?php echo htmlspecialchars($nama_kategori); ?>" onerror="this.src='../backend/uploads/default.png';">
                                <div class="des">
                                    <h4><?php echo strtoupper(htmlspecialchars($nama_kategori)); ?></h4>
                                    <h5><?php echo $jumlahInfo . " kegiatan"; ?></h5>
                                </div>
                            </div>
                            <?php
                        }
                    }
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

<!-- CSS untuk produk -->
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
    height: 200px;
    object-fit: cover;
    border-radius: 20px;
}

#produk .pro .des {
    text-align: start;
    padding: 10px 0;
}

#produk .pro .des h4 {
    padding-top: 7px;
    font-size: 15px;
    font-weight: 700;
    color: #088178;
}

#produk .pro .des h5 {
    padding-left: 7px;
    color: #1a1a1a;
    font-size: 14px;
}
</style>

<script src="script.js"></script>
</body>
</html>
