<!-- Vista de publicaciones -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones - Uforum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos CSS aquí */
    </style>
</head>
<body>
    <header>
        <!-- Encabezado aquí -->
    </header>

    <div class="container">
        <!-- Botón de cerrar sesión -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>

        <!-- Resto de tu contenido de la vista de publicaciones aquí -->
        <!-- ... -->

        <!-- Formulario para crear nuevas publicaciones -->
        <div class="card mb-4">
            <div class="card-header">Crear Nueva Publicación</div>
            <div class="card-body">
                <form method="POST" action="{{ route('publicaciones.crear') }}">
                    @csrf
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="contenido">Contenido</label>
                        <textarea class="form-control" id="contenido" name="contenido" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </form>
            </div>
        </div>

        <!-- Mostrar las publicaciones existentes -->
        @foreach ($publicaciones as $index => $publicacion)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $publicacion['titulo'] }}</h5>
                <p class="card-text">{{ $publicacion['contenido'] }}</p>
                <p class="card-text"><strong>Nombre:</strong> {{ $publicacion['nombre'] }}</p>
                <p class="card-text"><strong>Carnet:</strong> {{ $publicacion['carnet'] }}</p>
                <p class="card-text"><strong>Carrera:</strong> {{ $publicacion['carrera'] }}</p>
                <a href="{{ route('publicacion.detalle', $index) }}" class="btn btn-primary">Ver Detalles</a>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
