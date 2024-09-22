<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Mostrar la vista principal del médico.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('medico.index');
    }

    /**
     * Mostrar la vista para pacientes del médico.
     *
     * @return \Illuminate\View\View
     */
    public function patients()
    {
        return view('medico.patients');
    }
}
