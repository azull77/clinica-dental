<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Mostrar el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        return view('admin.create-user'); // Asegúrate de que la vista sea correcta
    }

    /**
     * Almacenar un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string'
        ]);

        // Crear un nuevo usuario
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Encriptar la contraseña
        ]);

        // Asignar el rol al usuario
        $user->assignRole($validatedData['role']);

        // Redirigir al listado de usuarios con un mensaje de éxito
        return redirect()->route('admin.create-user')->with('success', 'Usuario creado exitosamente.');
    }
}
