<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});


Route::get('/registro', function () {
    return view('registro');
})->name('registro.form'); // Asigna un nombre diferente para la visualización del formulario

Route::post('/registro', [RegistroController::class, 'registrar'])->name('registro'); // Utiliza el controlador para manejar el POST del formulario

Route::get('/', function () {
    return view('inicio');
});
Route::get('/chat', function () {
    return view('chat');
});

Route::get('/info', function () {
    return view('info');
});
Route::get('/usuario', function () {
    return view('usuario');
});

Route::post('/usuario/update', function () {
    // Aquí puedes manejar la lógica para actualizar la información del perfil.
    // Por ahora, solo redirige de vuelta a la página de usuario.
    return redirect('/usuario');
})->name('usuario.update');

Route::get('/login', [LoginController::class, 'mostrarFormulario'])->name('login.form');
Route::post('/login', [LoginController::class, 'iniciarSesion'])->name('login');

use App\Http\Controllers\UserController;

Route::get('/publicaciones', [PostController::class, 'index'])->name('publicaciones');
Route::get('/publicaciones/{id}', [PostController::class, 'detalle'])->name('publicacion.detalle');
Route::post('/publicaciones/{id}/comentar', [PostController::class, 'comentar'])->name('publicacion.comentar');
Route::post('/publicaciones/crear', [PostController::class, 'crearPublicacion'])->name('publicaciones.crear');
Route::post('/publicaciones/{id}/reaccionar', [PostController::class, 'reaccionar'])->name('publicacion.reaccionar');

Route::post('/logout', function () {
    // Lógica para cerrar la sesión
    auth()->logout(); // Cerrar la sesión utilizando el sistema de autenticación de Laravel
    
    // Redireccionar a la página de inicio o a donde desees después de cerrar sesión
    return redirect('/'); // Cambia la URL a la página de inicio o la que prefieras
})->name('logout');
Route::get('/users', [UserController::class, 'index']);
//chat
Route::get('/chat/{user}', [ChatController::class, 'index'])->name('chat.index');
Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');