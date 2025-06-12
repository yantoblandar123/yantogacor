<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Produk</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    #prodetail {
      display: flex;
      flex-wrap: wrap;
      padding: 40px;
      gap: 30px;
      justify-content: center;
      align-items: flex-start;
    }

    .s-pro-img {
      flex: 0 0 400px;
      max-width: 400px;
    }

    .s-pro-img img#gmbrutm {
      width: 100%;
      height: auto;
      max-height: 400px;
      object-fit: cover;
      border-radius: 10px;
    }

    .gmb-clk-grp {
      display: flex;
      justify-content: space-between;
      margin-top: 15px;
      gap: 10px;
      flex-wrap: wrap;
    }

    .gmb-clk-kol {
      flex: 1 1 22%;
      cursor: pointer;
    }

    .gmb-clk-kol img {
      width: 100%;
      border-radius: 5px;
      object-fit: cover;
      height: 70px;
    }

    .s-pro-detail {
      flex: 1 1 400px;
      max-width: 600px;
      padding-top: 10px;
    }

    .s-pro-detail h6 {
      font-size: 14px;
      color: gray;
      margin-bottom: 5px;
    }

    .s-pro-detail h4 {
      font-size: 22px;
      margin: 10px 0;
    }

    .s-pro-detail h2 {
      font-size: 26px;
      color: #088178;
      margin-bottom: 20px;
    }

    .s-pro-detail select,
    .s-pro-detail input {
      padding: 10px;
      margin-right: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    .s-pro-detail input[type="number"] {
      width: 70px;
    }

    .s-pro-detail button {
      padding: 12px 25px;
      background-color: #088178;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      margin-bottom: 20px;
    }

    .s-pro-detail span {
      display: block;
      line-height: 1.6;
      color: #333;
    }

    /* Responsive */
    @media screen and (max-width: 768px) {
      #prodetail {
        flex-direction: column;
        padding: 20px;
      }

      .s-pro-img,
      .s-pro-detail {
        max-width: 100%;
      }
    }
  </style>
</head>
<body>

<?php include('../fitur/header.php'); ?>

    <?php include('../fitur/menu.php'); ?>
<section id="prodetail">
  <!-- Gambar Produk -->
  <div class="s-pro-img">
    <img src="IMAGES/buevi.jpg" id="gmbrutm" alt="Gambar Utama" />

    <div class="gmb-clk-grp">
      <div class="gmb-clk-kol">
        <img src="IMAGES/buevi.jpg" alt="thumb" />
      </div>
      <div class="gmb-clk-kol">
        <img src="IMAGES/unduhan.jpg" alt="thumb" />
      </div>
      <div class="gmb-clk-kol">
        <img src="IMAGES/denah.png" alt="thumb" />
      </div>
      <div class="gmb-clk-kol">
        <img src="IMAGES/default.png" alt="thumb" />
      </div>
    </div>
  </div>

  <!-- Detail Produk -->
  <div class="s-pro-detail">
    <h6>posisi : kepala sekolah</h6>
    <h4>Nama :</h4>
    <h4>NIP :</h4>
    <h4>Tempat Tanggal Lahir : </h4>
    <h4>Jenis Kelamin : </h4>
    <h4>Mulai Menjabat : </h4>
    <h4>Periode Menjabat : </h4>
    <h2>Biodata</h2>
    <span>
      bu evi ( evi aviah...) lahir pada tahun ...... di kota ..... dan memulaipendidikana...........<br>
      ..............................................................................................<br>
      ..............................................................................................<br>
      ........................................................
    </span>
  </div>
</section>

<script>
  // Script untuk mengganti gambar utama saat klik thumbnail
  const mainImage = document.getElementById("gmbrutm");
  const thumbnails = document.querySelectorAll(".gmb-clk-kol img");

  thumbnails.forEach((thumb) => {
    thumb.addEventListener("click", () => {
      mainImage.src = thumb.src;
    });
  });
</script>

</body>
</html>
