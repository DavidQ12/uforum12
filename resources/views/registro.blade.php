<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Uforum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <!-- Logo de la aplicación -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
                <img src="{{ url('/public_images/Uforum_logo.png') }}" alt="Logo de Uforum" style="width: 100px; height: auto;">
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('registro') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="carrera" class="col-md-4 col-form-label text-md-right">{{ __('Carrera') }}</label>

                                <div class="col-md-6">
                                    <select id="carrera" class="form-control" name="carrera" required>
                                        <option value="">Seleccionar Carrera</option>
                                        <option value="Ingeniería en Sistemas">Ingeniería en Sistemas</option>
                                        <option value="Arquitectura">Arquitectura</option>
                                        <option value="Licenciatura en Ciencias Jurídicas">Licenciatura en Ciencias Jurídicas</option>
                                        <!-- Agregar más opciones según sea necesario -->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="carnet" class="col-md-4 col-form-label text-md-right">{{ __('Carnet de Estudiante') }}</label>

                                <div class="col-md-6">
                                    <input id="carnet" type="text" class="form-control" name="carnet" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrarse en Uforum') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
