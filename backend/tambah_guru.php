<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Guru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f8f8f8;
        }
        h2 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            max-width: 600px;
            margin-top: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #aaa;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Tambah Data Guru</h2>

<form action="proses_tambah_guru.php" method="POST" enctype="multipart/form-data">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required>

    <label for="nip">NIP:</label>
    <input type="text" name="nip" id="nip" required>

    <label for="posisi">Posisi:</label>
    <input type="text" name="posisi" id="posisi" required>

    <label for="tempat_lahir">Tempat Lahir:</label>
    <input type="text" name="tempat_lahir" id="tempat_lahir" required>

    <label for="tanggal_lahir">Tanggal Lahir:</label>
    <input type="date" name="tanggal_lahir" id="tanggal_lahir" required>

    <label for="jenis_kelamin">Jenis Kelamin:</label>
    <select name="jenis_kelamin" id="jenis_kelamin" required>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>

    <label for="mulai_menjabat">Mulai Menjabat:</label>
    <input type="date" name="mulai_menjabat" id="mulai_menjabat" required>

    <label for="periode_menjabat">Periode Menjabat:</label>
    <input type="text" name="periode_menjabat" id="periode_menjabat" required placeholder="Contoh: 2020 - 2024">

    <label for="biodata">Biodata:</label>
    <textarea name="biodata" id="biodata" rows="5" placeholder="Tulis biodata guru di sini..."></textarea>

    <label for="gambar">Foto Guru (bisa lebih dari 1):</label>
    <input type="file" name="gambar[]" id="gambar" multiple required accept="image/*">

    <input type="submit" value="Simpan">
</form>

</body>
</html>
