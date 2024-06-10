<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Uforum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        .btn {
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('public_images/Uforum_logo.png') }}" alt="Logo de Uforum" style="width: 100px; height: auto;">
        <h1>Bienvenido a Uforum</h1>
        <a href="{{ route('registro.form') }}" class="btn btn-primary">Registrarse</a>
        <a href="{{ route('login.form') }}" class="btn btn-secondary">Iniciar Sesión</a>
    </div>
</body>
</html>
