
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Uforum</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .card-header {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Perfil de Usuario - Uforum</h1>
    </header>

    <div class="container">
        <div class="card">
            <div class="card-header">Actualizar Información</div>
            <div class="card-body">
                <form method="POST" action="http://127.0.0.1:8000/usuario/update">
                    <input type="hidden" name="_token" value="Gtbde7NusBOM1BDmBppoBSFwEFLbEUFTzzxXx6UP" autocomplete="off">                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="Patrick Jeremi Orellana Menjívar" required>
                    </div>
                    <div class="form-group">
                        <label for="carnet">Carnet de estudiante</label>
                        <input type="text" id="carnet" name="carnet" value="SMSS108822" required>
                    </div>
                    <div class="form-group">
                        <label for="carrera">Carrera</label>
                        <input type="text" id="carrera" name="carrera" value="Ingeniería en Sistemas" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea id="descripcion" name="descripcion" rows="4">Me gusta programar y jugar videojuegos.</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>