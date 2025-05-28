<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open YouTube Video</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }
        .button-container {
            text-align: center;
        }
        .open-youtube-button {
            padding: 15px 30px;
            font-size: 18px;
            background-color: #FF0000;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .open-youtube-button:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <div class="button-container">
        <button class="open-youtube-button" onclick="openYouTube()">How to get your NECO RESULT</button>
    </div>

    <script>
        function openYouTube() {
            var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
            if (isMobile) {
                // Open in YouTube app for mobile
                window.location.href = "vnd.youtube://tbv0LKF0q-M";
            } else {
                // Open in browser for desktop
                window.location.href = "https://www.youtube.com/watch?v=tbv0LKF0q-M";
            }
        }
    </script>
</body>
</html>
