<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Árajánlat</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
            }

            .header,
            .footer {
                text-align: center;
                margin-bottom: 20px;
            }

            .content {
                margin-bottom: 20px;
            }

            .content table {
                width: 100%;
                border-collapse: collapse;
            }

            .content table,
            .content th,
            .content td {
                border: 1px solid black;
            }

            .content th,
            .content td {
                padding: 10px;
                text-align: left;
            }
        </style>
    </head>

    <body>
        <div class="header">
            <h1>Árajánlat</h1>
            <p>Paint Calculator</p>
        </div>
        <div class="content">
            <h2>Részletek</h2>
            <table>
                <thead>
                    <tr>
                        <th>Termék</th>
                        <th>Mennyiség</th>
                        <th>Egységár</th>
                        <th>Összeg</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Festék A</td>
                        <td>10 liter</td>
                        <td>2000 Ft/liter</td>
                        <td>20000 Ft</td>
                    </tr>
                    <tr>
                        <td>Festék B</td>
                        <td>5 liter</td>
                        <td>3000 Ft/liter</td>
                        <td>15000 Ft</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>Köszönjük, hogy a Paint Calculator-t választotta!</p>
        </div>
    </body>

</html>
