<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: admin_login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Dashboard Admin</h2>
    <p>Selamat datang, admin!</p>
    <ul>
        <li><a href="tambah_guru.php">Tambah Guru</a></li>
        <li><a href="tambah_info.php">Tambah Info</a></li>
        <li><a href="tmbh_artikel.php">Tambah Artikel</a></li>
        <li><a href="tmb_liputan.php">Tambah Liputan</a></li>
        <li><a href="tmb_beasiswa.php">Tambah Beasiswa</a></li>
        <li><a href="tmb_mading.php">Tambah Mading</a></li>
        <li><a href="save_carousel.php">Tambah Carousel</a></li>
    </ul>
    <p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>
