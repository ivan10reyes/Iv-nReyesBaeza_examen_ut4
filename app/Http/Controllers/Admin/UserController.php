<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los datos recibidos
        $datos = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',    // confirmed verifica que exista un campo password_confirmation con el mismo valor
        ]);

        $user = new User();
        $user->name = $datos['name'];
        $user->email = $datos['email'];
        $user->password = bcrypt($datos['password']);
        $user->save();

        return redirect()->route('admin.users.create')->with('success', 'Usuario creado correctamente.');
    }
}
