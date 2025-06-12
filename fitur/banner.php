<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFIL ALUMNI SMAN 1 MONTONG</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menu.css">
    <style>
        /* Gaya umum */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        /* Banner */
        .banner {
            position: relative; /* penting agar submenu mengikuti banner */
            max-width: 250px;
            background: #f4f4f4;
            padding: 15px;
            border-radius: 10px;
            text-align: start;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            color: rgb(46, 46, 46);
            display: inline-block;
        }

        .banner img {
            width: auto;
            height: 100px;
        }

        /* Submenu */
        #submenu5 {
            display: none;
            position: absolute;
            top: 30px;
            left: 100%; /* muncul di sebelah kanan banner */
            background-color: #ffffff;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            cursor: pointer;
            border-radius: 5px;
            white-space: nowrap;
        }

        #submenu5 div {
            padding: 10px 15px;
            border-bottom: 1px solid #eee;
        }

        #submenu5 div:hover {
            background-color: #f0f0f0;
            color: #6577ec;
        }
    </style>
</head>
<body>
    <div class="banner" onmouseover="showSubMenu('submenu5')" onmouseleave="hideSubMenu('submenu5')">
        <h1>banner</h1>
        <img src="IMAGES/dt.png" alt="Logo">
        <div id="submenu5" class="submenu" onmouseover="keepSubMenuOpen('submenu5')" onmouseleave="hideSubMenu('submenu5')">
            <div onclick="window.location.href='dtrack.php';">INFO DOUBLE TRACK</div>
            <div onclick="window.location.href='tataboga.php';">DT-TATABOGA</div>
            <div onclick="window.location.href='multimedia.php';">DT-MULTIMEDIA</div>
        </div>
    </div>

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
</body>
</html>
