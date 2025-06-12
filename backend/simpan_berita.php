<?php
// Set timezone
date_default_timezone_set('Asia/Jakarta');

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "sma");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$judul = $_POST['judul_berita'];
$isi = $_POST['isi_berita'];
$tanggal = date("Y-m-d H:i:s");

// Upload gambar utama
$gambar_utama = $_FILES['gambar_utama']['name'];
$tmp_utama = $_FILES['gambar_utama']['tmp_name'];
$nama_baru_utama = uniqid() . '_' . basename($gambar_utama);
$folder_upload = "../backend/uploads/";
move_uploaded_file($tmp_utama, $folder_upload . $nama_baru_utama);

// Simpan ke tabel berita
$stmt = $conn->prepare("INSERT INTO berita (judul_berita, isi_berita, gambar_berita, tanggal_ditambahkan) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $judul, $isi, $nama_baru_utama, $tanggal);
$stmt->execute();
$berita_id = $stmt->insert_id;
$stmt->close();

// Upload dan simpan gambar tambahan jika ada
if (!empty($_FILES['gambar_tambahan']['name'][0])) {
    foreach ($_FILES['gambar_tambahan']['tmp_name'] as $key => $tmp_name) {
        $nama_file = $_FILES['gambar_tambahan']['name'][$key];
        $nama_baru = uniqid() . '_' . basename($nama_file);
        if (move_uploaded_file($tmp_name, $folder_upload . $nama_baru)) {
            $stmt2 = $conn->prepare("INSERT INTO gambar_berita (id_berita, nama_file) VALUES (?, ?)");
            $stmt2->bind_param("is", $berita_id, $nama_baru);
            $stmt2->execute();
            $stmt2->close();
        }
    }
}

$conn->close();
echo "Berita berhasil disimpan.";
?>
