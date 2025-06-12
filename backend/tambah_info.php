<?php
$conn = new mysqli("localhost", "root", "", "sma");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama_kegiatan = $_POST['nama_kegiatan'];
$deskripsi = $_POST['deskripsi'];
$tanggal_kegiatan = $_POST['tanggal_kegiatan'];
$waktu_kegiatan = isset($_POST['waktu_kegiatan']) ? $_POST['waktu_kegiatan'] : NULL;
$lokasi_kegiatan = isset($_POST['lokasi_kegiatan']) ? $_POST['lokasi_kegiatan'] : NULL;
$id_kategori = $_POST['id_kategori'];

// 1. Simpan data ke tabel info
$stmt = $conn->prepare("INSERT INTO info (nama_kegiatan, deskripsi, tanggal_kegiatan, waktu_kegiatan, lokasi_kegiatan, id_kategori) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $nama_kegiatan, $deskripsi, $tanggal_kegiatan, $waktu_kegiatan, $lokasi_kegiatan, $id_kategori);
$stmt->execute();

$id_info = $conn->insert_id; // Ambil ID info yang baru disimpan

// 2. Proses file upload
$allowed_types = array('image/jpeg', 'image/png', 'image/jpg', 'video/mp4');

foreach ($_FILES['media']['tmp_name'] as $index => $tmp_name) {
    $file_name = $_FILES['media']['name'][$index];
    $file_tmp = $_FILES['media']['tmp_name'][$index];
    $file_type = $_FILES['media']['type'][$index];

    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_name = uniqid() . '.' . $ext;
    $upload_dir = "uploads/";
    $upload_path = $upload_dir . $new_name;

    // Pastikan folder uploads ada
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (in_array($file_type, $allowed_types)) {
        move_uploaded_file($file_tmp, $upload_path);

        $jenis_media = (strpos($file_type, 'video') !== false) ? 'video' : 'foto';

        // Simpan ke tabel info_media
        $stmt2 = $conn->prepare("INSERT INTO info_media (id_info, jenis_media, media_path) VALUES (?, ?, ?)");
        $stmt2->bind_param("iss", $id_info, $jenis_media, $upload_path);
        $stmt2->execute();
    }
}

echo "Data kegiatan berhasil disimpan.";
?>
