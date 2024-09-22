@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Paciente: {{ $patient->nombres }} {{ $patient->apellidos }}</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>N° de Expediente:</strong> {{ $patient->id }}</li>
        <li class="list-group-item"><strong>Fecha de Ingreso:</strong> {{ $patient->fecha_ingreso }}</li>
        <li class="list-group-item"><strong>Nombres:</strong> {{ $patient->nombres }}</li>
        <li class="list-group-item"><strong>Apellidos:</strong> {{ $patient->apellidos }}</li>
        <li class="list-group-item"><strong>Fecha de Nacimiento:</strong> {{ $patient->fecha_nacimiento }}</li>
        <li class="list-group-item"><strong>Género:</strong> {{ ucfirst($patient->genero) }}</li>
        <li class="list-group-item"><strong>Edad:</strong> {{ $patient->edad }}</li>
        <li class="list-group-item"><strong>Estado Civil:</strong> {{ ucfirst($patient->estado_civil) }}</li>
        <li class="list-group-item"><strong>Teléfono:</strong> {{ $patient->telefono }}</li>
        <li class="list-group-item"><strong>Celular:</strong> {{ $patient->celular }}</li>
        <li class="list-group-item"><strong>Correo Electrónico:</strong> {{ $patient->correo }}</li>
        <li class="list-group-item"><strong>WhatsApp:</strong> {{ $patient->whatsapp }}</li>
        <li class="list-group-item"><strong>Contacto de Emergencia:</strong> {{ $patient->emergencia_contacto }}</li>
        <li class="list-group-item"><strong>Teléfono de Emergencia:</strong> {{ $patient->emergencia_telefono }}</li>
        <li class="list-group-item"><strong>Ha visitado un odontólogo antes:</strong> {{ $patient->ha_visitado_odontologo ? 'Sí' : 'No' }}</li>
        <li class="list-group-item"><strong>Historia de la Presentación de Enfermedad:</strong> {{ $patient->historia_enfermedad }}</li>
        <li class="list-group-item"><strong>Historia Médica Personal:</strong> {{ $patient->historia_medica_personal }}</li>
        <li class="list-group-item"><strong>Antecedentes Médicos Familiares:</strong> {{ $patient->antecedentes_medicos_familiares }}</li>
        <li class="list-group-item"><strong>Presión Arterial:</strong> {{ $patient->pa }}</li>
        <li class="list-group-item"><strong>Pulso:</strong> {{ $patient->pulso }}</li>
        <li class="list-group-item"><strong>Temperatura:</strong> {{ $patient->temperatura }}</li>
        <li class="list-group-item"><strong>Examen Extraoral:</strong> {{ $patient->examen_extraoral }}</li>
        <li class="list-group-item"><strong>Examen Intraoral:</strong> {{ $patient->examen_intraoral }}</li>
    </ul>

    <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning mt-3">Editar</a>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
