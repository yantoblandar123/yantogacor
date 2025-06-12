<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website SMAN 1 MONTONG</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<?php include('../fitur/header.php'); ?>

<main> 
    <!-- Menu di sebelah kiri -->
    <aside id="menu-slide" class="menu-slide">
        <div class="menu-info">
            <div onclick="window.location.href='berita.php';">BERITA</div>
            <div onclick="window.location.href='adiwiyata.php';">KEGIATAN SEKOLAH</div>
            <div onclick="window.location.href='kontak.php';">KANAL YOUTUBE</div>
            <div onclick="window.location.href='adiwiyata.php';">DOUBLE TRACK SMA</div>
            <div onclick="window.location.href='adiwiyata.php';">ADIWIYATA</div>
            <div onclick="window.location.href='kontak.php';">KONTAK</div>
        </div>
    </aside>

    <!-- Konten di sebelah kanan -->
    <section class="konten-kanan">
        <div class="atas">
            <div class="news">
                <h1>Berita Terkini</h1>
                <p>Isi berita terbaru di sini...</p>
            </div>
        </div>
        <div class="bawah">
            <div class="opini">
                <h1>Opini</h1>
                <p>Isi opini atau artikel di sini...</p>
            </div>
        </div>
    </section>
</main>

<footer>
    <p>© 2025 Sekolah Menengah Atas Negeri 1 Montong</p>
</footer>

<script src="script.js"></script>

</body>
</html>
