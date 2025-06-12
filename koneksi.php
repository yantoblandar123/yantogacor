<?php
$host = 'localhost'; // atau nama host database Anda
$username = 'root'; // username database
$password = ''; // password database (kosong jika tidak ada)
$database = 'sma'; // nama database yang digunakan

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);

// Cek jika koneksi gagal
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
