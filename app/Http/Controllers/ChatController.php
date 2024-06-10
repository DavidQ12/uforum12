<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    private $randomResponses = [
        "¡Hola! ¿Cómo estás?",
        "Estoy bien, ¿y tú?",
        "Eso suena interesante.",
        "Cuéntame más sobre eso.",
        "¡Vaya! No sabía eso.",
        "¡Genial! Me alegra saberlo.",
        "Interesante...",
        "Wow, qué fascinante.",
        "¿De verdad? ¡Qué increíble!",
        "Entiendo. Continúa...",
        "¿Y qué piensas hacer al respecto?",
        "¡Muy interesante! Sigue así.",
        "¡Eso suena genial!",
        "¿Y luego qué pasó?",
        "¡Qué historia tan emocionante!",
        "Me dejas sin palabras...",
        "¿En serio? No puedo creerlo.",
        "¡Increíble! No puedo esperar a escuchar más.",
        "Wow, nunca había escuchado algo así.",
        "¡Estoy asombrado!",
    ];

    public function index($user)
    {
        $messages = session()->get('messages', []);
        return view('chat', ['messages' => $messages, 'user' => $user]);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'user' => 'required|string',
        ]);

        $messages = session()->get('messages', []);
        $user = $request->input('user');

        $this->saveMessage($messages, $request);
        $this->addRandomResponse($messages, $user);

        session()->put('messages', $messages);

        return redirect()->route('chat.index', ['user' => $user]);
    }

    private function saveMessage(&$messages, Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            // Validar la extensión del archivo de imagen
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
            $extension = $image->getClientOriginalExtension();
            if (!in_array($extension, $allowedExtensions)) {
                return redirect()->back()->withInput()->withErrors(['image' => 'La extensión del archivo de imagen no es válida.']);
            }
            
            // Guardar la imagen
            $imagePath = $image->store('images', 'public');
            $messages[] = ['user' => 'Tú', 'image' => $imagePath, 'type' => 'sender'];
        }

        $messageText = $request->input('message');
        if ($messageText) {
            $messages[] = ['user' => 'Tú', 'text' => $messageText, 'type' => 'sender'];
        }
    }

    private function addRandomResponse(&$messages, $user)
    {
        $randomResponse = $this->randomResponses[array_rand($this->randomResponses)];
        $messages[] = ['user' => $user, 'text' => $randomResponse, 'type' => 'receiver'];
    }
}
