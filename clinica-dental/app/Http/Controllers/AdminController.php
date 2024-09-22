<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Mostrar formulario para crear un nuevo usuario
    public function createUserForm()
    {
        return view('admin.create-user');
    }

    // Crear un nuevo usuario
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:Administrador,Médico,Paciente',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('name', $request->role)->first();
        if ($role) {
            $user->roles()->attach($role);
        }

        return redirect()->route('admin.createUserForm')->with('success', 'Usuario creado exitosamente.');
    }

    // Mostrar formulario para crear un nuevo paciente
    public function newPatientForm()
    {
        return view('admin.new-patient');
    }

    // Crear un nuevo paciente
    public function createPatient(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:10',
            'email' => 'nullable|string|email|max:255',
            'phone' => 'nullable|string|max:15',
            // Agrega otras validaciones según sea necesario
        ]);

        // Crear el nuevo paciente
        Patient::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            // Otros campos que el paciente pueda tener
        ]);

        return redirect()->route('patients.index')->with('success', 'Paciente creado exitosamente.');
    }

    // Método de respaldo de seguridad u otros métodos administrativos
    public function backup()
    {
        // Aquí iría la lógica para crear un respaldo del sistema
        return view('admin.backup');
    }

    // Método para administrar usuarios (opcional, si ya lo tenías en mente)
    public function manageUsers()
    {
        $users = User::all();
        return view('admin.manage-users', compact('users'));
    }

    // Método para administrar doctores (si es necesario)
    public function newDoctorForm()
    {
        return view('admin.new-doctor');
    }

    public function createDoctor(Request $request)
    {
        // Lógica para crear un nuevo doctor similar a createUser
    }

    // Método para mostrar un consentimiento (si es parte de tu flujo)
    public function consentForm()
    {
        return view('admin.consent');
    }
}
