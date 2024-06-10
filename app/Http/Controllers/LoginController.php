<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function mostrarFormulario()
    {
        return view('login');
    }

    public function iniciarSesion(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'identificador' => 'required|string',
            'password' => 'required|string',
        ]);

        // Lógica de autenticación (esto es solo un ejemplo simple, en una aplicación real usarías autenticación basada en base de datos)
        $identificador = $request->input('identificador');
        $password = $request->input('password');

        // Ejemplo de autenticación ficticia
        if ($identificador === 'admin' && $password === 'password') {
            $request->session()->put('usuario', 'Admin');
            return redirect()->route('publicaciones'); // Redirige a la vista de publicaciones
        }

        // Si la autenticación falla, redirigir de nuevo con un mensaje de error
        return redirect()->back()->withErrors(['Identificador o contraseña incorrectos']);
    }
}
