<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PROFIL ALUMNI SMAN 1 MONTONG</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menu.css">
    <style>
        .sosmed {
            max-width: 400px;
            width: 100%;
            background: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
        }

        .sosmed h1 {
            margin-bottom: 15px;
            font-size: 20px;
            color: #333;
        }

        .sosmed-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .sosmed-icons img {
            width: 40px;
            height: 40px;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .sosmed-icons img:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="sosmed">
        <h1>Sosial Media</h1>
        <div class="sosmed-icons">
            <img src="IMAGES/facebook.png" alt="Facebook"
                onclick="openSocial('fb://profile/SMAN 1 Montong', 'https://www.facebook.com/HumasSMAN1Montong')">
            <img src="IMAGES/instagram.png" alt="Instagram"
                onclick="openSocial('instagram://user?username=sman_1_montong', 'https://www.instagram.com/sman_1_montong?igsh=NDNvcGdmZ3l3dnJq')">
            <img src="IMAGES/x.png" alt="X"
                onclick="openSocial('twitter://user?screen_name=akunmu', 'https://twitter.com/akunmu')">
            <img src="IMAGES/telegram.png" alt="Telegram"
                onclick="openSocial('tg://resolve?domain=akunmu', 'https://t.me/akunmu')">
        </div>
    </div>

    <script>
        function openSocial(appUrl, webUrl) {
            const start = Date.now();
            const iframe = document.createElement("iframe");
            iframe.style.display = "none";
            iframe.src = appUrl;
            document.body.appendChild(iframe);

            setTimeout(() => {
                const end = Date.now();
                if (end - start < 1500) {
                    window.location.href = webUrl;
                }
            }, 1000);
        }
    </script>
</body>
</html>
