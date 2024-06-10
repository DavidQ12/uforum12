<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $publicacion['titulo'] }} - Uforum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: relative;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        header img {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: auto;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .post {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .post h3 {
            margin-top: 0;
            color: #343a40;
            font-size: 2rem;
        }
        .post p {
            margin-bottom: 10px;
            color: #6c757d;
            line-height: 1.6;
        }
        .post-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            color: #6c757d;
            font-size: 0.9rem;
        }
        .post-footer span {
            display: block;
        }
        .post-footer strong {
            color: #343a40;
        }
        .comments {
            margin-top: 20px;
        }
        .comments h4 {
            color: #343a40;
            font-size: 1.5rem;
        }
        .comment {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
        }
        .comment p {
            margin-bottom: 5px;
        }
        .comment .username {
            font-weight: bold;
            color: #007bff; /* Color azul */
        }
        .chat-button {
            display: block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }
        .chat-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ asset('public_images/Uforum_logo.png') }}" alt="Logo de Uforum">
        <h1>{{ $publicacion['titulo'] }} - Uforum</h1>
    </header>

    <div class="container">
        <div class="post">
            <h3>{{ $publicacion['titulo'] }}</h3>
            <p>{{ $publicacion['contenido'] }}</p>
            <div class="post-footer">
                <span><strong>Nombre:</strong> {{ $publicacion['nombre'] }}</span>
                <span><strong>Carnet:</strong> {{ $publicacion['carnet'] }}</span>
                <span><strong>Carrera:</strong> {{ $publicacion['carrera'] }}</span>
            </div>
        </div>

        <div class="comments">
            <h4>Comentarios</h4>
            @foreach ($comentarios as $comentario)
            <div class="comment">
                <p><span class="username">{{ $comentario }}</span></p>
            </div>
            @endforeach
        </div>

        <form method="POST" action="{{ route('publicacion.comentar', $id) }}">
            @csrf
            <div class="form-group">
                <label for="comentario">Añadir Comentario</label>
                <textarea id="comentario" name="comentario" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <!-- Botones de reacción -->
        <div class="mt-4">
            <form action="{{ route('publicacion.reaccionar', $id) }}" method="POST">
                @csrf
                <button type="submit" name="reaccion" value="me_gusta" class="btn btn-sm btn-outline-primary">Me gusta ({{ $reacciones['me_gusta'] }})</button>
                <button type="submit" name="reaccion" value="no_me_gusta" class="btn btn-sm btn-outline-secondary">No me gusta ({{ $reacciones['no_me_gusta'] }})</button>
                <button type="submit" name="reaccion" value="me_encanta" class="btn btn-sm btn-outline-success">Me encanta ({{ $reacciones['me_encanta'] }})</button>
                <button type="submit" name="reaccion" value="me_enoja" class="btn btn-sm btn-outline-danger">Me enoja ({{ $reacciones['me_enoja'] }})</button>
            </form>
        </div>

        <!-- Botón de chat -->
        <a href="{{ route('chat.index', ['user' => $publicacion['nombre']]) }}" class="chat-button">Chatear con {{ $publicacion['nombre'] }}</a>
    </div>
</body>
</html>
