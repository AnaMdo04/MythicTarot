<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Correo de Contacto</title>
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
            <h1>¡Nuevo Mensaje de Contacto!</h1>
            <p><strong>Nombre:</strong> {{ $nombre }} {{ $apellido }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Mensaje:</strong> {{ $mensaje }}</p>
        </div>
        <div class="footer">
            © {{ date('Y') }} MythicTarot. Todos los derechos reservados.
        </div>
    </div>
</body>

</html>