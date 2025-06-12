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

<h2>Edit Carousel</h2>

<form action="save_carousel.php" method="POST" enctype="multipart/form-data">
    <label for="judul">judul:</label>
    <input type="text" name="judul" id="judul" required>

    <label for="subjudul1">subjudul1:</label>
    <input type="text" name="subjudul1" id="subjudul1" required>

    <label for="subjudul2">subjudul2:</label>
    <input type="text" name="subjudul2" id="subjudul2" required>

    <label for="deskripsi">deskripsi:</label>
    <input type="text" name="deskripsi" id="deskripsi" required>

    <label for="teks_tombol">text tombol:</label>
    <input type="text" name="teks_tombol" id="teks_tombol" required>

    <label for="gambar">gambar:</label>
    <input type="file" name="gambar[]" id="gambar" multiple required accept="image/*">

    <input type="submit" value="Simpan">
</form>

</body>
</html>
