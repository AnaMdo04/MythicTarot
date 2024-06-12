<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido a MythicTarot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .email-container {
            width: 100%;
            max-width: 600px;
            background-color: #ffffff;
            margin: 20px auto;
            padding: 0;
            border: none;
            overflow: hidden;
        }

        .header,
        .footer {
            background-color: #377081;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            margin: 0;
        }

        .content {
            padding: 20px;
            background-color: #feecde;
            margin: 0;
            border-top: 3px solid #377081;
        }

        .footer {
            font-size: 14px;
        }

        img {
            height: 120px;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <img src="https://i.imgur.com/wEbZanN.png" alt="MythicTarot Logo">
        </div>
        <div class="content">
            <h1>¡Bienvenido a MythicTarot, {{ $name }}!</h1>
            <p>Gracias por registrarte en nuestra plataforma. Estamos emocionados de que te unas a nuestra comunidad.</p>
            <p>Si tienes alguna pregunta, no dudes en contactarnos.</p>
            <p>¡Disfruta de tu experiencia!</p>
            <p>Saludos,<br>El equipo de MythicTarot</p>
        </div>
        <div class="footer">
            © {{ date('Y') }} MythicTarot. Todos los derechos reservados.
        </div>
    </div>
</body>

</html>
