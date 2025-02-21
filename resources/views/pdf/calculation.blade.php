<!DOCTYPE html>
<html lang="hu">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Számítás</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            .container {
                width: 80%;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1,
            h2 {
                color: #333;
            }

            p {
                line-height: 1.6;
                color: #666;
            }

            .header {
                text-align: center;
                margin-bottom: 20px;
            }

            .header img {
                max-width: 150px;
            }

            .details {
                margin-bottom: 20px;
            }

            .details p {
                margin: 5px 0;
            }

            .footer {
                text-align: center;
                margin-top: 20px;
                font-size: 12px;
                color: #999;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="header">
                <img src="{{ asset('images/harzo-logo.png') }}" alt="Harzo Logo">
                <h1>Számítási Részletek</h1>
            </div>
            <div class="details">
                <h2>Ügyfél Információk</h2>
                <p><strong>Teljes Név:</strong> {{ $data['full_name'] }}</p>
                <p><strong>Email:</strong> {{ $data['email'] }}</p>
                <p><strong>Kiválasztott Festékkategória:</strong> {{ $data['selectedPaintCategory']['name'] }}</p>
                <p><strong>Kiválasztott Festék:</strong> {{ $data['selectedPaint']['description'] }}</p>
                <p><strong>Terület:</strong> {{ $data['area'] }} m²</p>
                <p><strong>Régió:</strong> {{ $data['region'] }}</p>
                <p><strong>Üzlet:</strong> {{ $data['Store'] }}</p>
            </div>
            <div class="footer">
                <p>&copy; {{ date('Y') }} Harzo. Minden jog fenntartva.</p>
            </div>
        </div>
    </body>

</html>
