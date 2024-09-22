@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Paciente: {{ $patient->nombres }} {{ $patient->apellidos }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patients.update', $patient) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Navegación por etapas -->
        <ul class="nav nav-tabs" id="patientFormTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="stage1-tab" data-bs-toggle="tab" href="#stage1" role="tab">Etapa 1</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="stage2-tab" data-bs-toggle="tab" href="#stage2" role="tab">Etapa 2</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="stage3-tab" data-bs-toggle="tab" href="#stage3" role="tab">Etapa 3</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="stage4-tab" data-bs-toggle="tab" href="#stage4" role="tab">Etapa 4</a>
            </li>
        </ul>

        <!-- Contenido de las etapas -->
        <div class="tab-content">
            <!-- Etapa 1 -->
            <div class="tab-pane fade show active" id="stage1" role="tabpanel">
                <div class="form-group mt-3">
                    <label for="expediente">N° de Expediente</label>
                    <input type="text" class="form-control" id="expediente" name="expediente" value="{{ $patient->expediente }}" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="fecha_ingreso">Fecha de Ingreso</label>
                    <input type="text" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="{{ $patient->fecha_ingreso }}" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" value="{{ $patient->nombres }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $patient->apellidos }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $patient->fecha_nacimiento }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="genero">Género</label>
                    <select class="form-control" id="genero" name="genero" required>
                        <option value="masculino" {{ $patient->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="femenino" {{ $patient->genero == 'femenino' ? 'selected' : '' }}>Femenino</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="edad">Edad</label>
                    <input type="text" class="form-control" id="edad" name="edad" value="{{ $patient->edad }}" disabled>
                </div>
                <button class="btn btn-primary mt-3" type="button" onclick="nextTab('#stage2')">Siguiente</button>
            </div>

            <!-- Etapa 2 -->
            <div class="tab-pane fade" id="stage2" role="tabpanel">
                <div class="form-group mt-3">
                    <label for="estado_civil">Estado Civil</label>
                    <select class="form-control" id="estado_civil" name="estado_civil" required>
                        <option value="soltero" {{ $patient->estado_civil == 'soltero' ? 'selected' : '' }}>Soltero</option>
                        <option value="casado" {{ $patient->estado_civil == 'casado' ? 'selected' : '' }}>Casado</option>
                        <option value="viudo" {{ $patient->estado_civil == 'viudo' ? 'selected' : '' }}>Viudo</option>
                        <option value="divorciado" {{ $patient->estado_civil == 'divorciado' ? 'selected' : '' }}>Divorciado</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $patient->telefono }}">
                </div>
                <div class="form-group mt-3">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" value="{{ $patient->celular }}">
                </div>
                <div class="form-group mt-3">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="{{ $patient->correo }}">
                </div>
                <button class="btn btn-primary mt-3" type="button" onclick="nextTab('#stage3')">Siguiente</button>
            </div>

            <!-- Etapa 3 -->
            <div class="tab-pane fade" id="stage3" role="tabpanel">
                <div class="form-group mt-3">
                    <label for="whatsapp">WhatsApp</label>
                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $patient->whatsapp }}">
                </div>
                <div class="form-group mt-3">
                    <label for="emergencia_contacto">En caso de emergencia, contactar a</label>
                    <input type="text" class="form-control" id="emergencia_contacto" name="emergencia_contacto" value="{{ $patient->emergencia_contacto }}">
                </div>
                <div class="form-group mt-3">
                    <label for="emergencia_telefono">Teléfono de emergencia</label>
                    <input type="text" class="form-control" id="emergencia_telefono" name="emergencia_telefono" value="{{ $patient->emergencia_telefono }}">
                </div>
                <button class="btn btn-primary mt-3" type="button" onclick="nextTab('#stage4')">Siguiente</button>
            </div>

            <!-- Etapa 4 -->
            <div class="tab-pane fade" id="stage4" role="tabpanel">
                <div class="form-group mt-3">
                    <label for="ha_visitado_odontologo">¿Ha visitado un odontólogo antes?</label>
                    <select class="form-control" id="ha_visitado_odontologo" name="ha_visitado_odontologo" required>
                        <option value="1" {{ $patient->ha_visitado_odontologo ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ !$patient->ha_visitado_odontologo ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <h2>Evaluación Sistémica del Paciente</h2>
                <div class="form-group mt-3">
                    <label for="historia_enfermedad">Historia de la Presentación de Enfermedad</label>
                    <textarea class="form-control" id="historia_enfermedad" name="historia_enfermedad">{{ $patient->historia_enfermedad }}</textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="historia_medica_personal">Historia Médica Personal</label>
                    <textarea class="form-control" id="historia_medica_personal" name="historia_medica_personal">{{ $patient->historia_medica_personal }}</textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="antecedentes_medicos_familiares">Antecedentes Médicos Familiares</label>
                    <textarea class="form-control" id="antecedentes_medicos_familiares" name="antecedentes_medicos_familiares">{{ $patient->antecedentes_medicos_familiares }}</textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="pa">Presión Arterial</label>
                    <input type="text" class="form-control" id="pa" name="pa" value="{{ $patient->pa }}">
                </div>
                <div class="form-group mt-3">
                    <label for="pulso">Pulso</label>
                    <input type="text" class="form-control" id="pulso" name="pulso" value="{{ $patient->pulso }}">
                </div>
                <div class="form-group mt-3">
                    <label for="temperatura">Temperatura</label>
                    <input type="text" class="form-control" id="temperatura" name="temperatura" value="{{ $patient->temperatura }}">
                </div>
                <div class="form-group mt-3">
                    <label for="examen_extraoral">Examen Extraoral</label>
                    <textarea class="form-control" id="examen_extraoral" name="examen_extraoral">{{ $patient->examen_extraoral }}</textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="examen_intraoral">Examen Intraoral</label>
                    <textarea class="form-control" id="examen_intraoral" name="examen_intraoral">{{ $patient->examen_intraoral }}</textarea>
                </div>
                <button type="submit" class="btn btn-success mt-3">Guardar Cambios</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function nextTab(tabId) {
        $('.nav-tabs .nav-link').removeClass('active');
        $('.tab-pane').removeClass('show active');
        $(tabId + '-tab').addClass('active');
        $(tabId).addClass('show active');
    }
</script>
@endsection
