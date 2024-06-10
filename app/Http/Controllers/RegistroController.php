<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function registrar(Request $request)
    {
        // Aquí iría la lógica para procesar el formulario de registro
        // Puedes agregar validaciones y lógica para guardar los datos del usuario

        // Ejemplo: obtener el nombre de usuario del formulario
        $nombreUsuario = $request->input('nombre_usuario');

        // Almacenar el nombre de usuario en la sesión
        $request->session()->put('usuario', $nombreUsuario);

        // Redireccionar a la página de publicaciones después de completar el registro
        return redirect()->route('publicaciones');
    }
}
