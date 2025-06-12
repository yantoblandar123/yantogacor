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
                <div class="container-konten">
                <?php include('../fitur/sosmed.php'); ?>

                <?php include('../fitur/slide_menu.php'); ?>
</div>
                <div class="news">
                    <h1>SEJARAH SMA N 1 MONTONG</h1>
                    <video width="60%" height="60%" autoplay muted loop>
                        <source src="IMAGES/video3.mp4" type="video/mp4">
                        Browser kamu tidak mendukung tag video.
                    </video>
                    <p>SMA N 1 Montong merupakan SMA N 1 Montong Negeri pertama yang ada di Montong dan diresmikan pada tahun 2012. Alamatnya berada di Jl.Tanggulangin No.01 Montong Tuban. Sampai tahun 2008, sekitar 45 angkatan alumni telah berhasil lulus dengan jumlah alumninya yang cukup besar. SMA N 1 MONTONG telah mencetak alumni-alumni yang berhasil bersaing di universitas-universitas ternama.</p>
                </div>


</div>
            </div>
            <div class="bawah">
                <div class="opini">
                    <p>SMAN 1 Montong, terletak diatas perbukitan hutan jati memiliki lahan yang luas dengan kompleksitas persoalan infrastruktur. Dulu, tanpa akses internet, tanpa pagar, tanpa air bersih, listrik yang hampir tiap hari ada pemadaman, komputer yang usang dan rusak. Pemukiman penduduk yang berjauhan dan tidak ada akses kendaraan umum. Kondisi ini sangat berpengaruh pada guru yang 99% honorer dan siswa secara psikologis. 
SMAN 1 Montong berdiri sejak tanggal 22 Februaril 2008. Terletak di Jalan Raya Tanggulangin KM. 1. Sekolah satu atap dengan SMAN 1 Singgahan. Gedung Sekolah menjadi satu dengan SMPN 1 Montong. Meminjam ruang belajar SD Montongsekar yang saat itu tidak ditempati. Semua guru dan siswa membersihkan ruangan tersebut untuk ditempati sebagai kelas (ruang belajar). 
Kemudian melembaga berdasarkan SK Pendidirian Nomor:  188.45/37/KPTS/414.012/2012. Tanggal 22 Februaril 2012. Setelah itu mulai berangsur baik   Dan bersyukur bisa berbuat untuk sekolah mewujudkan cita-cita warga sekolah adanya air bersih, internet dan pagar sekolah. Semenjak itu kegiatan siswa yang bisa maksimal. Siswa dan guru menjadi betah disekolah.</p>
                </div>
                <div class="container-konten">
                <?php include('../fitur/kalender.php'); ?>
  
                </div>
                
            </div>
          </section>


    </main>
    
    <footer>
        <p>© 2025 Sekolah Menengah Atas Negeri 1 Montong</p>
    </footer>

    <script src="script.js"></script>
    <script>
        // Fungsi untuk menampilkan waktu secara real-time
    function updateClock() {
        const now = new Date();
        const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const months = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
            "September", "Oktober", "November", "Desember"
        ];

        const dayName = days[now.getDay()];
        const date = now.getDate();
        const month = months[now.getMonth()];
        const year = now.getFullYear();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');

        document.getElementById("clock").innerText = `${dayName}, ${date} ${month} ${year} - ${hours}:${minutes}:${seconds}`;
    }

    setInterval(updateClock, 1000);
    updateClock();

    // Fungsi untuk mendapatkan informasi cuaca
    function fetchWeather() {
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(async (position) => {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                const apiKey = "YOUR_API_KEY"; // Ganti dengan API key dari OpenWeatherMap
                const url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&units=metric&lang=id&appid=${apiKey}`;

                try {
                    const response = await fetch(url);
                    const data = await response.json();
                    const temp = Math.round(data.main.temp);
                    const description = data.weather[0].description;
                    const city = data.name;

                    document.getElementById("weather").innerText = `${city}: ${temp}°C, ${description}`;
                } catch (error) {
                    document.getElementById("weather").innerText = "Gagal memuat cuaca";
                }
            }, () => {
                document.getElementById("weather").innerText = "Lokasi tidak diizinkan";
            });
        } else {
            document.getElementById("weather").innerText = "Geolokasi tidak didukung";
        }
    }

    fetchWeather();
      function generateCalendar() {
        const calendarContainer = document.getElementById("calendar");
        const now = new Date();
        const month = now.getMonth();
        const year = now.getFullYear();
        const firstDayOfMonth = new Date(year, month, 1);
        const lastDayOfMonth = new Date(year, month + 1, 0);
        const todayDate = now.getDate();

        const daysOfWeek = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"]; // Hari Minggu - Sabtu
        const calendarHTML = document.createElement("div");
        calendarHTML.classList.add("calendar-container");

        // Header Hari (Minggu - Sabtu)
        daysOfWeek.forEach(day => {
            const dayElement = document.createElement("div");
            dayElement.classList.add("day");
            dayElement.textContent = day;
            calendarHTML.appendChild(dayElement);
        });

        // Tambahkan kotak kosong sebelum tanggal 1 agar sejajar dengan hari pertama bulan ini
        for (let i = 0; i < firstDayOfMonth.getDay(); i++) {
            const emptyElement = document.createElement("div");
            emptyElement.classList.add("date", "empty");
            calendarHTML.appendChild(emptyElement);
        }

        // Loop untuk tanggal dalam bulan ini
        for (let date = 1; date <= lastDayOfMonth.getDate(); date++) {
            const dateElement = document.createElement("div");
            dateElement.classList.add("date");
            dateElement.textContent = date;

            if (date === todayDate) {
                dateElement.classList.add("today");
            }

            calendarHTML.appendChild(dateElement);
        }

        calendarContainer.innerHTML = "";
        calendarContainer.appendChild(calendarHTML);
    }

    generateCalendar();

function toggleProfileSlide() {
    var slide = document.getElementById("profile-slide");
    slide.classList.toggle("show");
}
document.getElementById("close-profile").addEventListener("click", function() {
    document.getElementById("profile-slide").classList.remove("show");
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    // Mengatur interval slide show setiap 3 detik (3000ms)
    $('#carousel-example-generic').carousel({
      interval: 5000,
      pause: "hover" // Pause saat mouse berada di atas carousel
    });

    // Memastikan slide bergeser langsung jika tombol next atau prev ditekan
    $(".carousel-control").click(function() {
      $("#carousel-example-generic").carousel('pause').carousel('cycle');
    });
  });
</script>

  <script>
    jQuery(document).ready(function($) {
      $(".scroll").click(function(event) {
        event.preventDefault();
        $('html,body').animate({
          scrollTop: $(this.hash).offset().top
        }, 1000);
      });
    });

  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      /*
      	var defaults = {
      	containerID: 'toTop', // fading element id
      	containerHoverID: 'toTopHover', // fading element hover id
      	scrollSpeed: 1200,
      	easingType: 'linear' 
      	};
      */
      $().UItoTop({
        easingType: 'easeOutQuart'
      });
    });
  </script>
  <a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
  <!-- //moving-top scrolling -->
    </script>
    <script src="menu.js">
        
function toggleMenuSlide() {
var slide = document.getElementById("menu-slide");
slide.classList.toggle("show");
}
document.getElementById("close-menu").addEventListener("click", function() {
document.getElementById("menu-slide").classList.remove("show");
});
    </script>

<script>
    function showSubMenu(id) {
        document.getElementById(id).style.display = "block";
    }

    function hideSubMenu(id) {
        document.getElementById(id).style.display = "none";
    }

    function keepSubMenuOpen(id) {
        document.getElementById(id).style.display = "block";
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const slides = document.querySelectorAll('.slide');
        let currentSlide = 0;

        // Fungsi untuk menampilkan slide yang aktif
        const showSlide = (index) => {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.style.display = 'flex'; // Menampilkan slide aktif
                } else {
                    slide.style.display = 'none'; // Menyembunyikan slide lain
                }
            });
        };

        // Menampilkan slide pertama saat halaman dimuat
        showSlide(currentSlide);

        // Navigasi ke slide sebelumnya
        document.getElementById('prev-slide').addEventListener('click', () => {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        });

        // Navigasi ke slide berikutnya
        document.getElementById('next-slide').addEventListener('click', () => {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        });
    });
</script>




    
</body>
</html>
