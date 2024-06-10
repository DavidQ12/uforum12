<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Show a list of all of the application's active users.
     */
    public function index()
    {
        // Seleccionar usuarios activos
        $users = DB::select('SELECT * FROM users WHERE active = ?', [1]);
        
        // Pasar los usuarios a la vista 'user.index'
        return view('user.index', ['users' => $users]);
    }
} 