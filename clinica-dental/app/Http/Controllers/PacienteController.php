<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Mostrar la vista principal del paciente.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('paciente.index');
    }

    /**
     * Mostrar la vista para las citas del paciente.
     *
     * @return \Illuminate\View\View
     */
    public function appointments()
    {
        return view('paciente.appointments');
    }
}
