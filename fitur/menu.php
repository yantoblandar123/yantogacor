<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFIL ALUMNNI SMAN 1 MONTONG</title>
</head>
<body>
    <div id="menu-slide" class="menu-slide">
            <div class="menu-info">
                <div class="menu-wrapper" onmouseover="showSubMenu('submenu1')" onmouseleave="hideSubMenu('submenu1')">
                    HOME
                </div>
                <div class="menu-wrapper" onmouseover="showSubMenu('submenu2')" onmouseleave="hideSubMenu('submenu2')">
                    SPMB
                </div>
                <div class="menu-wrapper" onmouseover="showSubMenu('submenu3')" onmouseleave="hideSubMenu('submenu3')">
                    PUBLIKASI
                </div>
                <div class="menu-wrapper" onmouseover="showSubMenu('submenu4')" onmouseleave="hideSubMenu('submenu4')">
                    AGENDA
                </div>
                <div onclick="window.location.href='adiwiyata.php';">ADIWIYATA</div>
                <div id="home-button" class="home-button">
                <img src="IMAGES/home.png" width="30" height="30" onclick="window.location.href='index.php';" alt="">
                </div>
                </div>
            <div id="close-menu" class="close-menu">
                <h1 onclick="document.getElementById('menu-slide').style.display='none'">✖</h1>
            </div>
        </div>
        
        <!-- Submenu di luar menu-slide -->
        
        <div id="submenu1" class="submenu" onmouseover="keepSubMenuOpen('submenu1')" onmouseleave="hideSubMenu('submenu1')">
            <div onclick="window.location.href='sejarah.php';">SEJARAH SMAN 1 MONTONG</div>
            <div onclick="window.location.href='visi_misi.php';">VISI & MISI</div>  
            <div class="menu-wrapper" onmouseover="showSubMenu('submenu6')" onmouseleave="hideSubMenu('submenu6')">
                PROFIL SEKOLAH
            </div>  
        </div>        
        <div id="submenu2" class="submenu" onmouseover="keepSubMenuOpen('submenu2')" onmouseleave="hideSubMenu('submenu2')">
            <div onclick="window.location.href='juknis_spmb.php';">JUKNIS SPMB 2025</div>
            <div onclick="window.location.href='daftar_ulang.php';">DAFTAR ULANG</div>
            <div onclick="window.location.href='pengambilan_pin.php';">PENGAMBILAN PIN</div>
        </div>

        <div id="submenu3" class="submenu" onmouseover="keepSubMenuOpen('submenu3')" onmouseleave="hideSubMenu('submenu3')">
            <div class="menu-wrapper" onmouseover="showSubMenu('submenu7')" onmouseleave="hideSubMenu('submenu7')">
                ARTIKEL
            </div>
            <div onclick="window.location.href='liputan.php';">LIPUTAN</div>
            <div onclick="window.location.href='mading.php';">MADING</div>
            <div onclick="window.location.href='beasiswa.php';">BEASISWA</div>
        </div>

        <div id="submenu4" class="submenu" onmouseover="keepSubMenuOpen('submenu4')" onmouseleave="hideSubMenu('submenu4')">
            <div onclick="window.location.href='waka_kurikulum.php';">WAKA KURIKULUM</div>
            <div onclick="window.location.href='waka_kesiswaan.php';">WAKA KESISWAAN</div>
            <div onclick="window.location.href='waka_sarpras.php';">WAKA SARPRAS</div>
            <div onclick="window.location.href='waka_humas.php';">WAKA HUMAS</div>
        </div>

        <div id="submenu6" class="submenu" onmouseover="keepSubMenuOpen('submenu6')" onmouseleave="hideSubMenu('submenu6')">
            <div onclick="window.location.href='kurikulum.php';">KURIKULUM</div>
            <div onclick="window.location.href='kesiswaan.php';">KESISWAAN</div>  
            <div onclick="window.location.href='sarana_prasarana.php';">SARANA PRASARANA</div>  
            <div onclick="window.location.href='humas.php';">HUMAS</div>  
        </div>
        <div id="submenu7" class="submenu" onmouseover="keepSubMenuOpen('submenu7')" onmouseleave="hideSubMenu('submenu7')">
            <div onclick="window.location.href='kurikulum.php';">OPINI</div>
            <div onclick="window.location.href='kesiswaan.php';">PRAKTIK BAIK</div>  
            <div onclick="window.location.href='sarana_prasarana.php';">ARTIKEL PENDIDIKAN</div>  
            <div onclick="window.location.href='humas.php';">ARTIKEL ILMIAH</div> 
        </div>
    </div>
</div>





         
        </div>  
            <div class="jnck">
                <div class="isi">
                    <img src="IMAGES/menu.jpeg" onclick="toggleMenuSlide()" width="50" height="50" alt="">
                </div>
                <div class="isi">
                    <h1>SMA NEGERI 1 MONTONG</h1>
                    <P>THE RIGHT CHOICE FOR YOUR EDUCATION</P>
                </div>
                <div class="isi">
                    <img src="IMAGES/logonya.png" width="70" height="100" alt="">
                </div>
                <div class="isi">
                    <h3 onclick="toggleProfileSlide()" width="50" height="50" alt="">KONTAK</h3>
                </div>
            </div>
            <div id="profile-slide" class="profile-slide">
        <div class="profile-header">
            <h1>HUBUNGI KAMI</h1>
        </div>
        <div class="profile-info">
            <h2>KONTAK</h2>
            <p><strong>Alamat:</strong></p>
            <p>Jl. Raya Tanggulangin KM 01 Montong Tuban</p>
            <p><strong>Telepon:</strong></p>
            <P>0356-4214568</p>
            <p><strong>Email:</strong></p>
            <p>info@sman1montong.sch.id</p>
            <p><strong>Website:</strong></p>
            <p>www.sman1montong.sch.id</p>
        </div>
        <button id="close-profile" class="close-profile">Close</button>
    </div>
            
<style>
    
.jnck .isi img {
    cursor: pointer;
}

.jnck {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    position: relative;
    width: 100%;
    padding: 10px 0;
    height: 120px;
}

.jnck .isi:first-child {
    position: absolute;
    left: 10px;
    top: 30px; /* Posisikan tombol menu di paling kiri */
}

.jnck .isi:nth-child(3) {
    position: absolute;
    left: 100px;/* Posisikan tombol menu di paling kiri */
}

.jnck .isi:nth-child(4) {
    position: absolute;
    right: 10px; /* Posisikan tombol menu di paling kiri */
}

.menu-slide h1, .profile-slide p {
    color: #000000;
    font-size: medium;
    text-align: center;
    font-weight: bold;
}

.jnck .isi:nth-child(2) {
    display: flex;
    flex-direction: column;
    position: absolute;
    text-align: start;
    left: 200px; /* Posisikan teks di tengah */
}
/*slide profil*/
.menu-slide {
    transition: left 0.3s ease;
    display: flex;
    position: absolute;
    top: 230px;
    cursor: pointer;
    left: -80%;
    height: 11vh;
    width: 80%;
    background-color: #f1f1f1;
    box-shadow: 0 40px 60px rgba(0, 0, 0, 0.01);
    padding: 80px 0 0 10px;
    z-index: 999;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    overflow: auto;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
    padding: 80px 0 0 10px;
    border-radius: 5px;
}
.menu-slide.show {
    left: 0;
}
.menu-info {
    position: absolute;
    top: 10px;
    left: 30px;
    display: flex;
    justify-content: center; /* Menyusun menu ke tengah */
    gap: 20px; /* Memberikan jarak antara kotak menu */
    flex-wrap: wrap; /* Menyesuaikan agar responsif di layar kecil */
    padding: 10px;
}

.home-button {
    position: absolute;
    top: -5px;
    right: 10px;
    background: rgba(27, 26, 26, 0);
    color: white;
    border: none;
    cursor: pointer;
    font-size: 18px;
    border-radius: 5px;
    transition: 0.3s;
}
.close-menu {
    position: absolute;
    top: 15px;
    right: 10px;
    background: rgba(27, 26, 26, 0);
    color: white;
    border: none;
    padding: 8px 12px;
    cursor: pointer;
    font-size: 18px;
    border-radius: 5px;
    transition: 0.3s;
}

.close-menu:hover {
    background: darkred;
}

        /* Menu utama */
        .menu-info div {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #55555500;
            position: relative;
        }

        .menu-info div:hover {
            color: #6577ec;
        }
        .menu-wrapper {
            position: relative;
            display: block;
        }
        /* Submenu berada di luar menu-slide */
        #submenu1 {
            display: none;
            position: absolute; /* Agar terpisah dari menu-slide */
            left: 70px; /* Agar muncul di luar menu-slide */
            top: 290px; /* Posisi default submenu */
            background-color: #ffffff;
            width: fit-content;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }

        #submenu1 div {
            padding: 10px;
            border-bottom: 1px solid #ffffff;
            white-space: nowrap;
        }

        #submenu1 div:hover {
            background-color: #ffffff;
            color: #6577ec;
        }

        #submenu2 {
            display: none;
            position: absolute; /* Agar terpisah dari menu-slide */
            left: 150px; /* Agar muncul di luar menu-slide */
            top: 290px; /* Posisi default submenu */
            background-color: #ffffff;
            width: fit-content;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            cursor: pointer;
        }

        #submenu2 div {
            padding: 10px;
            border-bottom: 1px solid #ffffff;
            white-space: nowrap;
        }

        #submenu2 div:hover {
            background-color: #ffffff;
            color: #6577ec;
        }

        #submenu3 {
            display: none;
            position: absolute; /* Agar terpisah dari menu-slide */
            left: 270px; /* Agar muncul di luar menu-slide */
            top: 290px; /* Posisi default submenu */
            background-color: #ffffff;
            width: fit-content;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            cursor: pointer;
        }

        #submenu3 div {
            padding: 10px;
            border-bottom: 1px solid #ffffff;
            white-space: nowrap;
        }

        #submenu3 div:hover {        
            background-color: #ffffff;
            color: #6577ec;
        }

        #submenu4 {
            display: none;
            position: absolute; /* Agar terpisah dari menu-slide */
            left: 370px; /* Agar muncul di luar menu-slide */
            top: 290px; /* Posisi default submenu */
            background-color: #ffffff;
            width: fit-content;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            cursor: pointer;
        }

        #submenu4 div {
            padding: 10px;
            border-bottom: 1px solid #ffffff;
            white-space: nowrap;
        }

        #submenu4 div:hover {
            background-color: #ffffff;
            color: #6577ec;
        }  

        #submenu6 {
            display: none;
            position: absolute;
            left: 220px; /* Sesuaikan agar muncul di samping kanan "PROFIL SEKOLAH" */
            top: 380px;  /* Sesuaikan agar muncul sejajar dengan item "PROFIL SEKOLAH" */
            background-color: #ffffff;
            width: fit-content;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            cursor: pointer;
        }
        
        #submenu6 div {
            padding: 10px;
            border-bottom: 1px solid #ffffff;
            white-space: nowrap;
        }
        
        #submenu6 div:hover {
            background-color: #ffffff;
            color: #6577ec;
        }
        #submenu7 {
            display: none;
            position: absolute; /* Agar terpisah dari menu-slide */
            left: 360px; /* Agar muncul di luar menu-slide */
            top: 290px; /* Posisi default submenu */
            background-color: #ffffff;
            width: fit-content;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            cursor: pointer;
        }

        #submenu7 div {
            padding: 10px;
            border-bottom: 1px solid #ffffff;
            white-space: nowrap;
        }

        #submenu7 div:hover {        
            background-color: #ffffff;
            color: #6577ec;
        }
        
/*slide profil*/
.profile{
    display: flex;
}

.profile-slide {
    transition: right 0.5s ease;
    display: flex;
    position: fixed;
    right: -50%;
    width: 30%;
    background-color:rgb(197, 201, 206);
    box-shadow: 0 40px 60px rgba(0, 0, 0, 0.01);
    padding: 80px 0 0 10px;
    z-index: 999;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    text-align: left;
    overflow: auto;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
    padding: 80px 0 0 10px;
    display: none;
    position: fixed;
    top: 0;
    right: 0;
    height: 100vh;
    border: 1px solid #ccc;
    box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
    overflow-y: auto;
    border-radius: 10px;
}

.profile-header img {
    width: 250px;
    height: 250px;
    border-radius: 50%;
    object-fit: cover;
}


.profile-slide.show {
    right: 0;
}

.profile-slide img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 10px;
    align-self: flex-start;
}

.profile-slide h1, .profile-slide h2, .profile-slide p {
    color:rgb(26, 26, 26);
    text-align: left;
}

.profile-slide.show{
    right: 0 !important;
}

#open-link{
    width: 40%;
    margin-top: 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
#open-link a{
    text-decoration: none;
    color: #ffffff;
    width: 100%;
    text-align: center;

}

.profile-header {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px;
}

.profile-header img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
}

.profile-text {
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: rgb(21, 21, 21);
}

.profile-content {
    display: flex;
    flex-wrap: wrap;
    padding: 10px 20px;
}

.profile-info {
    flex: 1;
    min-width: 250px; /* Agar tetap rapi pada layar kecil */
    color:rgb(21, 21, 21);
    padding-right: 15px;
    gap: 20px;
}
.close-profile {
    position: absolute;
    top: 15px;
    right: 10px;
    background: rgba(27, 26, 26, 0);
    color: white;
    border: none;
    padding: 8px 12px;
    cursor: pointer;
    font-size: 18px;
    border-radius: 5px;
    transition: 0.3s;
}

.close-profile:hover {
    background: darkred;
}
        
</style>
<script>
    
function toggleMenuSlide() {
var slide = document.getElementById("menu-slide");
slide.classList.toggle("show");
}
document.getElementById("close-menu").addEventListener("click", function() {
document.getElementById("menu-slide").classList.remove("show");
});
</script>
</body>
<script>
    function toggleMenuSlide() {
        const menu = document.getElementById("menu-slide");
        if (menu.classList.contains("show")) {
            menu.classList.remove("show");
        } else {
            menu.classList.add("show");
        }
    }

    function toggleProfileSlide() {
        const profile = document.getElementById("profile-slide");
        if (profile.style.display === "block") {
            profile.style.display = "none";
        } else {
            profile.style.display = "block";
        }
    }

    function showSubMenu(id) {
        document.getElementById(id).style.display = 'block';
    }

    function hideSubMenu(id) {
        document.getElementById(id).style.display = 'none';
    }

    function keepSubMenuOpen(id) {
        document.getElementById(id).style.display = 'block';
    }

    // Optional: Tutup profile-slide saat klik tombol ✖
    document.getElementById("close-profile").addEventListener("click", function() {
        document.getElementById("profile-slide").style.display = "none";
    });
</script>

</html>
