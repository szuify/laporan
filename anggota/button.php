<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Surat</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .btn {
            display: inline-block;
            padding: 10px 30px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #ff9800;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px #e68900;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        .btn:hover {
            background-color: #fb8c00;
        }

        .btn:active {
            background-color: #e68900;
            box-shadow: 0 2px #b86400;
            transform: translateY(2px);
        }
    </style>
    <script>
        function redirectToURL(url) {
            window.location.href = url;
        }
    </script>
</head>
<body>
    <?php
    $url = "https://forms.gle/iTRQeU7PbtnssZuy7";
    ?>

    <button class="btn" onclick="redirectToURL('<?php echo $url; ?>')">Link Form Ajuan Surat</button>
</body>
</html>
