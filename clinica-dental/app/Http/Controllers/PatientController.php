<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los pacientes con paginación
        $patients = Patient::paginate(10);
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validaciones
        $validatedData = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|in:masculino,femenino',
            'estado_civil' => 'required|in:soltero,casado,viudo,divorciado',
            'telefono' => 'nullable|numeric',
            'celular' => 'nullable|numeric',
            'correo' => 'nullable|email',
            'whatsapp' => 'nullable|numeric',
            'emergencia_contacto' => 'nullable|string|max:255',
            'emergencia_telefono' => 'nullable|numeric',
            'ha_visitado_odontologo' => 'required|boolean',
        ]);

        // Calcular la edad
        $age = Carbon::parse($request->fecha_nacimiento)->age;

        // Crear el paciente
        $patient = Patient::create([
            'expediente' => 'EXP-' . str_pad(Patient::count() + 1, 6, '0', STR_PAD_LEFT), // Número de expediente único y autoincrementable
            'fecha_ingreso' => now(),
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'edad' => $age,
            'estado_civil' => $request->estado_civil,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'correo' => $request->correo,
            'whatsapp' => $request->whatsapp,
            'emergencia_contacto' => $request->emergencia_contacto,
            'emergencia_telefono' => $request->emergencia_telefono,
            'ha_visitado_odontologo' => $request->ha_visitado_odontologo,
        ]);

        return redirect()->route('patients.index')->with('success', 'Paciente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        // Validaciones
        $validatedData = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|in:masculino,femenino',
            'estado_civil' => 'required|in:soltero,casado,viudo,divorciado',
            'telefono' => 'nullable|numeric',
            'celular' => 'nullable|numeric',
            'correo' => 'nullable|email',
            'whatsapp' => 'nullable|numeric',
            'emergencia_contacto' => 'nullable|string|max:255',
            'emergencia_telefono' => 'nullable|numeric',
            'ha_visitado_odontologo' => 'required|boolean',
        ]);

        // Calcular la edad
        $age = Carbon::parse($request->fecha_nacimiento)->age;

        // Actualizar el paciente
        $patient->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'edad' => $age,
            'estado_civil' => $request->estado_civil,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'correo' => $request->correo,
            'whatsapp' => $request->whatsapp,
            'emergencia_contacto' => $request->emergencia_contacto,
            'emergencia_telefono' => $request->emergencia_telefono,
            'ha_visitado_odontologo' => $request->ha_visitado_odontologo,
        ]);

        return redirect()->route('patients.index')->with('success', 'Paciente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Paciente eliminado exitosamente.');
    }
}
