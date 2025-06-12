<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFIL ALUMNNI SMAN 1 MONTONG</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <div class="kalender">
        <h1>Kalender</h1>
        <div id="calendar"></div>
    </div>
    <style>
        
/* Kalender */
.kalender {
    max-width: 400px;
    width: 100%;
    max-height: 400px;
    background: #f4f4f4;
    padding: 15px;
    margin: 20px auto;
    border-radius: 10px;
    text-align: center;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
}
    .kalender h1 {
        margin-bottom: 10px;
        font-size: 18px;
        color: #333;
    }

    .calendar-container {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        background: white;
        padding: 10px;
        border-radius: 5px;
        width: fit-content;
    }

    .day, .date {
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        font-size: 14px;
        font-weight: bold;
    }

    .day {
        background: #333;
        color: white;
    }

    .date {
        background: #ddd;
        color: #333;
    }

    .today {
        background: #2e5889;
        color: white;
        font-weight: bold;
    }

    .empty {
        visibility: hidden;
    }

    </style>
<script>
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
</script>
</body>
</html>