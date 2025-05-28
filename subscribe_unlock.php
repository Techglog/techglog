<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribe to Unlock</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: #fff;
            text-align: center;
            padding: 50px;
            margin: 0;
        }

        h2 {
            font-size: 36px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .subscribe-button {
            padding: 15px 30px;
            background-color: #FF0000;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .subscribe-button:hover {
            background-color: #e60000;
            transform: translateY(-2px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        }

        .hidden-link {
            display: none;
            margin-top: 40px;
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.2);
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-out forwards;
        }

        .hidden-link a {
            color: #ffe;
            text-decoration: none;
            border-bottom: 2px solid #ffb;
            transition: color 0.3s, border-bottom 0.3s;
        }

        .hidden-link a:hover {
            color: #fff;
            border-bottom: 2px solid #fff;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <h2>Subscribe to Unlock the Link to waec website</h2>
    <p>To access the link, please subscribe to our YouTube channel!</p>
    <button class="subscribe-button" onclick="subscribeToChannel()">Subscribe</button>

    <div id="hidden-link" class="hidden-link">
        <p>Thank you for subscribing! Here is the waec link:</p>
        <a href="https://portal.waec.org/account/register" target="_blank">Click here to access the site</a>
    </div>

    <script>
        function subscribeToChannel() {
            // Open the YouTube channel in a new tab
            window.open('https://www.youtube.com/channel/UCqnZQ3dDEkOM2CDT4VemStg', '_blank');

            // Immediately show the hidden link after clicking the subscribe button
            document.getElementById('hidden-link').style.display = 'block';
        }
    </script>
</body>
</html>
