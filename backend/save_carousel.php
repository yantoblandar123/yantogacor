<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "sma");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$judul = $_POST['judul'];
$subjudul1 = $_POST['subjudul1'];
$subjudul2 = $_POST['subjudul2'];
$deskripsi = $_POST['deskripsi'];
$teks_tombol = $_POST['teks_tombol'];

// Validasi input
if (empty($judul) || empty($subjudul1) || empty($subjudul2) || empty($deskripsi) || empty($teks_tombol)) {
    die('Semua data wajib diisi.');
}

// Simpan data ke tabel carousel_slide
$stmt = $conn->prepare("INSERT INTO carousel_slide (judul, subjudul1, subjudul2, deskripsi, teks_tombol) VALUES (?, ?, ?, ?, ?)");
if (!$stmt) {
    die('Prepare failed: ' . $conn->error);
}

$stmt->bind_param("sssss", $judul, $subjudul1, $subjudul2, $deskripsi, $teks_tombol);

if (!$stmt->execute()) {
    die('Execute failed: ' . $stmt->error);
}

// Ambil id carousel yang baru ditambahkan
$id = $stmt->insert_id;

// Lokasi folder penyimpanan gambar
$upload_dir = __DIR__ . '/uploads';

if (!file_exists($upload_dir)) {
    if (!mkdir($upload_dir, 0777, true)) {
        die('Gagal membuat folder uploads.');
    }
}

// Upload gambar
if (isset($_FILES['gambar']) && is_array($_FILES['gambar']['name'])) {
    $total_files = count($_FILES['gambar']['name']);

    for ($i = 0; $i < $total_files; $i++) {
        $tmp_name = $_FILES['gambar']['tmp_name'][$i];
        $name = basename($_FILES['gambar']['name'][$i]);

        $allowed_types = array('image/jpeg', 'image/png', 'image/webp', 'image/jpg');
        $file_type = mime_content_type($tmp_name);

        if (in_array($file_type, $allowed_types)) {
            $target_path = $upload_dir . DIRECTORY_SEPARATOR . $name;

            if (move_uploaded_file($tmp_name, $target_path)) {
                $stmt_gambar = $conn->prepare("INSERT INTO carousel_media (id_carousel, nama_media) VALUES (?, ?)");
                if ($stmt_gambar === false) {
                    die('Prepare failed: ' . $conn->error);
                }
                $stmt_gambar->bind_param("is", $id, $name);
                if (!$stmt_gambar->execute()) {
                    die('Execute failed: ' . $stmt_gambar->error);
                }
            } else {
                echo "❌ Gagal mengunggah file: $name<br>";
            }
        } else {
            echo "⚠️ File $name bukan gambar yang diperbolehkan.<br>";
        }
    }

    echo "✅ Data carousel berhasil disimpan.";
} else {
    echo "⚠️ Tidak ada file gambar yang diupload.";
}
?>
