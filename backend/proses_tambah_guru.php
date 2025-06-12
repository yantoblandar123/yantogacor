<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "sma");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$mulai_menjabat = $_POST['mulai_menjabat'];
$periode_menjabat = $_POST['periode_menjabat'];
$posisi = $_POST['posisi'];
$biodata = $_POST['biodata'];

// Validasi input
if (empty($nama) || empty($nip) || empty($tempat_lahir) || empty($tanggal_lahir) || empty($jenis_kelamin) || empty($mulai_menjabat) || empty($periode_menjabat) || empty($posisi)) {
    die('Semua data wajib diisi.');
}

// Simpan data guru ke tabel guru
$stmt = $conn->prepare("INSERT INTO guru (nama, nip, tempat_lahir, tanggal_lahir, jenis_kelamin, mulai_menjabat, periode_menjabat, posisi, biodata) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die('Prepare failed: ' . $conn->error);
}

$stmt->bind_param("sssssssss", $nama, $nip, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $mulai_menjabat, $periode_menjabat, $posisi, $biodata);

if (!$stmt->execute()) {
    die('Execute failed: ' . $stmt->error);
}

// Ambil id guru yang baru ditambahkan
$id_guru = $stmt->insert_id;

// Lokasi folder penyimpanan gambar
$upload_dir = __DIR__ . '/uploads'; // Gunakan path absolut yang benar

// Buat folder jika belum ada
if (!file_exists($upload_dir)) {
    if (!mkdir($upload_dir, 0777, true)) {
        die('Gagal membuat folder uploads.');
    }
}

// Cek apakah ada file yang diupload
if (isset($_FILES['gambar']) && is_array($_FILES['gambar']['name'])) {
    $total_files = count($_FILES['gambar']['name']);

    for ($i = 0; $i < $total_files; $i++) {
        $tmp_name = $_FILES['gambar']['tmp_name'][$i];
        $name = basename($_FILES['gambar']['name'][$i]);

        // Validasi hanya file gambar
        $allowed_types = array('image/jpeg', 'image/png', 'image/webp', 'image/jpg');
        $file_type = mime_content_type($tmp_name);

        if (in_array($file_type, $allowed_types)) {
            $target_path = $upload_dir . DIRECTORY_SEPARATOR . $name;

            if (move_uploaded_file($tmp_name, $target_path)) {
                $stmt_gambar = $conn->prepare("INSERT INTO guru_gambar (id_guru, nama_file) VALUES (?, ?)");
                if ($stmt_gambar === false) {
                    die('Prepare failed: ' . $conn->error);
                }
                $stmt_gambar->bind_param("is", $id_guru, $name);
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

    echo "✅ Data guru berhasil disimpan.";
} else {
    echo "⚠️ Tidak ada file gambar yang diupload.";
}
?>
