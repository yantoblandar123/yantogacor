<?php
$conn = new mysqli("localhost", "root", "", "sma");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$query = "SELECT * FROM kategori_kegiatan ORDER BY id_kategori ASC";
$result = $conn->query($query);

$kategori_options = '';
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $kategori_options .= '<option value="' . $row['id_kategori'] . '">' . htmlspecialchars($row['nama_kategori']) . '</option>';
    }
} else {
    $kategori_options = '<option value="">Tidak ada kategori tersedia</option>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Kegiatan</title>
</head>
<body>
    <form action="tambah_info.php" method="POST" enctype="multipart/form-data">
        <label>Nama Kegiatan:</label>
        <input type="text" name="nama_kegiatan" required><br>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" required></textarea><br>

        <label>Tanggal Kegiatan:</label>
        <input type="date" name="tanggal_kegiatan" required><br>

        <label>Waktu Kegiatan:</label>
        <input type="time" name="waktu_kegiatan"><br>

        <label>Lokasi Kegiatan:</label>
        <input type="text" name="lokasi_kegiatan"><br>

        <label>Kategori Kegiatan:</label><br>
        <select name="id_kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <?php echo $kategori_options; ?>
        </select><br><br>

        <label>Upload Foto/Video:</label>
        <input type="file" name="media[]" multiple required><br><br>

        <button type="submit">Simpan Kegiatan</button>
    </form>
</body>
</html>