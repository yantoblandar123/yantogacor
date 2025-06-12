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

$query = "SELECT * FROM guru";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

if (mysqli_num_rows($result) === 0) {
    echo "<p>Tidak ada data guru ditemukan.</p>";
} else {
    while ($row = mysqli_fetch_assoc($result)) :
        $id_guru = $row['id_guru'];

        $imgQuery = mysqli_query($koneksi, "SELECT nama_file FROM guru_gambar WHERE id_guru = $id_guru LIMIT 1");
        if ($imgQuery && mysqli_num_rows($imgQuery) > 0) {
            $imgRow = mysqli_fetch_assoc($imgQuery);
            $gambar = $imgRow['nama_file'];
        } else {
            $gambar = 'default.png';
        }
        ?>
        <div class="pro" onclick="window.location.href='sguru.php?id=<?php echo $id_guru; ?>';">
            <img src="../backend/uploads/<?php echo $gambar; ?>" alt="<?php echo htmlspecialchars($row['nama']); ?>" onerror="this.src='../backend/uploads/default.png';">
            <div class="des">
                <h4><?php echo strtoupper(htmlspecialchars($row['posisi'])); ?></h4>
                <h5><?php echo htmlspecialchars($row['nama']); ?></h5>
            </div>
        </div>
    <?php endwhile;
}
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
        </div>
    </section>

</main>
    
<footer>
    <p>© 2025 Sekolah Menengah Atas Negeri 1 Montong</p>
</footer>
<style>
           
#produk{
    text-align: center;
}

#produk .pro-container{
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

#produk .pro:hover{
    box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.06);
}

#produk .pro img {
    width: 100%;
    border-radius: 20px;
}

#produk .pro .des{
    text-align: start;
    padding: 10px 0;
}

#produk .pro  .des span {
    color: #606063;
    font-size: 12px;
}

#produk .pro  .des h5 {
    padding-left: 7px;
    color: #1a1a1a;
    font-size: 14px;
}

#produk .pro  .des i {
    font-size: 12px;
    color: rgb(243, 181, 25);
}

#produk .pro  .des h4 {
    padding-top: 7px;
    font-size: 15px;
    font-weight: 700;
    color: #088178;
}

#produk .pro  .cart{
    font-size: 30px;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 50px;
    background-color: #e8f6ea;
    font-weight: 700;
    color: #088178;
    border: 1px solid #cce7d8;
    position: absolute;
    bottom: 20px;
    right: 10px;
}

</style>
<script src="script.js"></script>
    
</body>
</html>
