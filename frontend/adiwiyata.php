<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEJARAH SMAN 1 MONTONG</title>
    <link rel="stylesheet" href="sejarah.css">
    <link rel="stylesheet" href="menu.css">
</head>
<body>
<?php include('../fitur/header.php'); ?>

    <main>
    <?php include('../fitur/menu.php'); ?>
          <section>
            <div class="atas">
               
                <div class="news">
                    <h1>SARANA PRASARANA</h1>
                    <section id="produk" class="section-p1">
        <div class="pro-container">
            <div class="pro" onclick="window.location.href='sproduk2.html';">
                <img src="IMAGES/IMG-20240501-WA0017.jpg" alt="">
                <div class="des">
                    <span>anjay</span>
                    <h5>Perpustakaan</h5>
                </div>
            </div>
            <div class="pro" onclick="window.location.href='sproduk3.html';">
                <img src="IMAGES/IMG-20240501-WA0018.jpg" alt="">
                <div class="des">
                    <span>anjay</span>
                    <h5>KOPSIS</h5>
                </div>
            </div>
            <div class="pro" onclick="window.location.href='sproduk4.html';">
                <img src="IMAGES/IMG-20240501-WA0030.jpg" alt="">
                <div class="des">
                    <span>anjay</span>
                    <h5>Laboratorium</h5>
                </div>
            </div>
            <div class="pro" onclick="window.location.href='sproduk5.html';">
                <img src="IMAGES/IMG-20240501-WA0059.jpg" alt="">
                <div class="des">
                    <span>anjay</span>
                    <h5>Lapangan Utama</h5>
                </div>
            </div>
            <div class="pro" onclick="window.location.href='sproduk6.html';">
                <img src="IMAGES/IMG-20240501-WA0038.jpg" alt="">
                <div class="des">
                    <span>anjay</span>
                    <h5>Kantin</h5>
                </div>
            </div>
            <div class="pro" onclick="window.location.href='sproduk7.html';">
                <img src="IMAGES/IMG-20240501-WA0033.jpg" alt="">
                <div class="des">
                    <span>anjay</span>
                    <h5>Ruang Kelas</h5>
                </div>
            </div>
            <div class="pro" onclick="window.location.href='sproduk8.html';">
                <img src="IMAGES/IMG-20240501-WA0041.jpg" alt="">
                <div class="des">
                    <span>anjay</span>
                    <h5>Ruang BK</h5>
                </div>
            </div>
            <div class="pro" onclick="window.location.href='sproduk8.html';">
                <img src="IMAGES/IMG-20240501-WA0041.jpg" alt="">
                <div class="des">
                    <span>anjay</span>
                    <h5>Mushola</h5>
                </div>
            </div>
            <div class="pro" onclick="window.location.href='sproduk8.html';">
                <img src="IMAGES/IMG-20240501-WA0041.jpg" alt="">
                <div class="des">
                    <span>anjay</span>
                    <h5>Toilet</h5>
                </div>
            </div>
        </div>
    </section>
</div>
                 <div class="container-konten">
                    <?php include('../fitur/sosmed.php'); ?>

                    <?php include('../fitur/slide_menu.php'); ?>

                    <?php include('../fitur/kalender.php'); ?>
                </div>


</div>
            </div>
          </section>


    </main>
    <style>
        
#produk{
    text-align: center;
}

#produk .pro-container{
    display: flex;
    justify-content: space-between;
    padding-top: 20px;
    flex-wrap: wrap;
}

#produk .pro {
    width: 23%;
    min-width: 250px;
    padding: 10px 12px;
    border: 1px solid #cce7d0;
    border-radius: 25px;
    cursor: pointer;
    box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.02);
    margin: 15px 0;
    transition: 0.2s ease;
    position: relative;
}

#produk .pro:hover{
    box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.06);
}

#produk .pro img {
    width: 100%;
    border-radius: 20px;
}

#produk .pro .des{
    text-align: start;
    padding: 10px 0;
}

#produk .pro  .des span {
    color: #606063;
    font-size: 12px;
}

#produk .pro  .des h5 {
    padding-left: 7px;
    color: #1a1a1a;
    font-size: 14px;
}

#produk .pro  .des i {
    font-size: 12px;
    color: rgb(243, 181, 25);
}

#produk .pro  .des h4 {
    padding-top: 7px;
    font-size: 15px;
    font-weight: 700;
    color: #088178;
}

#produk .pro  .cart{
    font-size: 30px;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 50px;
    background-color: #e8f6ea;
    font-weight: 700;
    color: #088178;
    border: 1px solid #cce7d8;
    position: absolute;
    bottom: 20px;
    right: 10px;
}

    </style>
    <footer>
        <p>© 2025 Sekolah Menengah Atas Negeri 1 Montong</p>
    </footer>

    
</body>
</html>
