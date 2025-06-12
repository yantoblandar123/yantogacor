<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website SMAN 1 MONTONG</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menu.css">
</head>
<body>
<?php include('../fitur/header.php'); ?>

<main>
    <?php include('../fitur/menu.php'); ?>

    <section>
        <div class="atas">
            <?php include('../fitur/banner.php'); ?>
            <div class="news">
                <h1>berita terkini</h1>
            </div>
            <?php include('../fitur/sosmed.php'); ?>
        </div>
        <div class="bawah">
            <div class="opini">
                <h1>Denah Lokasi</h1>
            
                <div class="profile-content">
                    <div class="profile-info">
                    <img src="IMAGES/denah.png" width="380" height="400" alt="">
                    </div>
                    <div class="profile-info">
                        <p>mewujudkan visi sekolah. Menginterpretasikan sumber daya manusia yang cerdas dan positif dalam pembelajaran. Dengan dukungan Sumber Daya yang cukup sekolah ini siap untuk berkolaborasi dalam pelayanan publik. 

                            Teknologi Informasi Website khususnya, menjadi sarana bagi SMA Negeri 1 Montong untuk memberi pelayanan informasi secara cepat, jelas, dan akuntabel. Dari layanan ini pula, sekolah siap menerima saran dari semua pihak yang akhirnya dapat menjawab bahwa SMA Negeri 1 Montong menjadi pilihan masyarakat. 
                            
                            Melakukan revitalisasi infrastruktur untuk mendukung proses belajar mengajar disekolah. Diperlukan suasana yang nyaman dan berorientasi pada murid. Dengan menerapkan pembelajaran yang menyenangkan, sekolah berkewajiban memberikan ruang kreasi dan inovasi bagi seluruh warga sekolah dalam rangka mengembangkan diri mereka sesuai dengan kodratnya. Dan selamat dalam menjalani proses kehidupannya secara mandiri.
                            
                            Salah satu pembelajaran kemandirian yang berorientasi pada siswa adalah program double track. Program ini merupakan pembelajaran tambahan disekolah yang bertujuan untuk memberikan pengetahuan dan implementasi kemandirian disaat murid kembali kemasyarakat. The Right Choice For Your Education!. [*]</p>
                    </div>           
        </div>
            </div>
            <div class="container-konten">
                <!-- Kalender -->
                <?php include('../fitur/kalender.php'); ?>

                <!-- Slider Menu -->

                <?php include('../fitur/slide_menu.php'); ?>
            </div>
        </div>
    </section>

</main>
    
<footer>
    <p>© 2025 Sekolah Menengah Atas Negeri 1 Montong</p>
</footer>

<script src="script.js"></script>
    
</body>
</html>

