<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $publicaciones = [
        [
            'titulo' => 'Publicación de David Ernesto Quintanilla Segovia',
            'contenido' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
            'nombre' => 'David Ernesto Quintanilla Segovia',
            'carnet' => 'SMSS152722',
            'carrera' => 'Ingeniería en Sistemas y Redes',
        ],
        [
            'titulo' => 'Publicación de Luis Francisco Pleitez Quintanilla',
            'contenido' => 'Proin ac mauris non sem faucibus ultrices...',
            'nombre' => 'Luis Francisco Pleitez Quintanilla',
            'carnet' => 'SMSS073122',
            'carrera' => 'Ingeniería en Sistemas',
        ],
        [
            'titulo' => 'Publicación de Patrick Jeremi Orellana Menjívar',
            'contenido' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere...',
            'nombre' => 'Patrick Jeremi Orellana Menjívar',
            'carnet' => 'SMSS108822',
            'carrera' => 'Ingeniería en Sistemas',
        ],
    ];

    public function index()
    {
        return view('publicaciones', ['publicaciones' => $this->publicaciones]);
    }

    public function detalle($id)
    {
        if (!isset($this->publicaciones[$id])) {
            abort(404);
        }

        $comentarios = session()->get("comentarios_$id", []);

        if (!is_array($comentarios)) {
            $comentarios = [];
        }

        $reacciones = session()->get("reacciones_$id", [
            'me_gusta' => 0,
            'no_me_gusta' => 0,
            'me_encanta' => 0,
            'me_enoja' => 0,
        ]);

        return view('publicacion_detalle', [
            'publicacion' => $this->publicaciones[$id],
            'comentarios' => $comentarios,
            'reacciones' => $reacciones,
            'id' => $id
        ]);
    }

    public function comentar(Request $request, $id)
    {
        $request->validate([
            'comentario' => 'required|string',
        ]);

        $comentarios = session()->get("comentarios_$id", []);
        $comentario = $request->input('comentario');
        $usuario = session()->get('usuario', 'Anónimo');
        $comentarios[] = "$usuario: $comentario";

        session()->put("comentarios_$id", $comentarios);

        return redirect()->route('publicacion.detalle', $id);
    }

    public function crearPublicacion(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'contenido' => 'required|string',
        ]);

        $titulo = $request->input('titulo');
        $contenido = $request->input('contenido');

        $nuevaPublicacion = [
            'titulo' => $titulo,
            'contenido' => $contenido,
        ];

        array_unshift($this->publicaciones, $nuevaPublicacion);

        return redirect()->route('publicaciones');
    }

    public function reaccionar(Request $request, $id)
    {
        $request->validate([
            'reaccion' => 'required|in:me_gusta,no_me_gusta,me_encanta,me_enoja',
        ]);

        $reaccion = $request->input('reaccion');
        $reacciones = session()->get("reacciones_$id", [
            'me_gusta' => 0,
            'no_me_gusta' => 0,
            'me_encanta' => 0,
            'me_enoja' => 0,
        ]);

        $reacciones[$reaccion]++;

        session()->put("reacciones_$id", $reacciones);

        return redirect()->route('publicacion.detalle', $id);
    }
}
