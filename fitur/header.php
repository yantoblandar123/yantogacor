<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Header dengan Cuaca dan Waktu</title>
  <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
    }

    #header h1 {
    font-size: 24px;
}

    #header {
      background:rgb(159, 180, 206);
      box-shadow: 0 5px rgba(0, 0, 0, 0.06);
      z-index: 999;
      position: sticky;
      top: 0;
      left: 0;
      width: 100%;
      height: 100px;
      border-radius: 5px;
      padding: 15px 30px;
    }

    #navbar {
    list-style: none;
    display: flex;
    justify-content: center;
    align-items: center;
}

.welcome {
  font-family: 'Courier Prime', monospace;
  font-size: 50px; /* Biar lebih besar dan elegan */
  color: white;
  white-space: nowrap;
  overflow: hidden;
  border-right: 2px solid white;
  animation: typing 4s steps(40, end) forwards, blink 0.75s step-end infinite;
  text-align: center;
}

.typing-animation {
  display: inline-block;
  overflow: hidden;
  white-space: nowrap;
  border-right: 2px solid white;
  animation: typing 3s steps(30, end), blink-caret 0.7s step-end infinite;
  font-family: 'Poppins', sans-serif; /* Font lebih modern dan enak dibaca */
  font-size: 28px;
  font-weight: bold;
  color: white;
}

@keyframes typing {
  from { width: 0; }
  to { width: 100%; }
}

@keyframes blink-caret {
  0%, 100% { border-color: transparent; }
  50% { border-color: white; }
}

/* Tambahkan ini supaya setelah animasi selesai, border-right hilang */
.typing-animation.finished {
  border-right: none;
}

#navbar li {
    margin: 0 5px;
}

#navbar a {
    text-decoration: none;
    color: white;
    padding: 10px 5px;
    border-radius: 5px;
    transition: 0.3s;
}


    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: white;
    }

    .isi {
      font-size: 14px;
      padding: 5px 15px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .kiri {
      text-align: left;
      flex: 1;
      left:0;
    }

    .tengah {
      flex: 2;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .kanan {
      text-align: right;
      flex: 1;
      justify-content: flex-end;
      right:0;
    }

    #weather-icon {
      width: 24px;
      height: 24px;
    }

    #weather, #clock {
      word-break: keep-all;
      white-space: nowrap;
    }

    @media (max-width: 600px) {
      .navbar {
        flex-direction: column;
        align-items: flex-start;
      }

      .kiri, .kanan {
        text-align: left;
        width: 100%;
        padding: 5px 0;
        justify-content: flex-start;
      }
    }
  </style>
</head>
<body>

  <header id="header">
    <div class="navbar">
  <div class="isi kiri">
    <img id="weather-icon" src="" alt="Icon Cuaca" />
    <p id="weather">Memuat...</p>
  </div>

  <div class="isi tengah">
    <p class="welcome">Selamat Datang</p>
  </div>

  <div class="isi kanan">
    <p id="clock">Memuat...</p>
  </div>
</div>

  </header>

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
            const icon = data.weather[0].icon;
            const iconUrl = `https://openweathermap.org/img/wn/${icon}@2x.png`;

            document.getElementById("weather").innerText = `${city}: ${temp}°C, ${description}`;
            document.getElementById("weather-icon").src = iconUrl;
            document.getElementById("weather-icon").alt = description;
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
  </script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const typingElement = document.querySelector(".typing-animation");

    typingElement.addEventListener("animationend", function(event) {
      if (event.animationName === "typing") {
        typingElement.classList.add("finished");
      }
    });
  });
</script>
</body>
</html>
