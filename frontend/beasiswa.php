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

    <?php include('../fitur/slide_baner.php'); ?>

    <section>
        <div class="atas">
            <?php include('../fitur/banner.php'); ?>
            <div class="news">
                <h1>berita terkini</h1>
            </div>
            <?php include('../fitur/sosmed.php'); ?>
        </div>
        <div class="bawah">
            <div class="opini">
                <h1>opini</h1>
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
    
<footer>
    <p>© 2025 Sekolah Menengah Atas Negeri 1 Montong</p>
</footer>

<script src="script.js"></script>
    
</body>
</html>
