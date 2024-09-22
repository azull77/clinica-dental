@extends('layouts.menu')

@section('content')
<div class="container">
    <h1>Crear Nuevo Paciente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf

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
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="stage5-tab" data-bs-toggle="tab" href="#stage5" role="tab">Etapa 5</a>
            </li>
        </ul>

        <!-- Contenido de las etapas -->
        <div class="tab-content">
            <!-- Etapa 1 -->
            <div class="tab-pane fade show active" id="stage1" role="tabpanel">
                <!-- Campos de etapa 1 -->
                <div class="form-group mt-3">
                    <label for="expediente">N° de Expediente</label>
                    <input type="text" class="form-control" id="expediente" name="expediente" value="{{ old('expediente') }}" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="fecha_ingreso">Fecha de Ingreso</label>
                    <input type="text" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="{{ now() }}" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="genero">Género</label>
                    <select class="form-control" id="genero" name="genero" required>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="edad">Edad</label>
                    <input type="text" class="form-control" id="edad" name="edad" value="{{ old('edad') }}" disabled>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button class="btn btn-primary" type="button" onclick="nextTab('#stage2')">Siguiente</button>
                </div>
            </div>

            <!-- Etapa 2 -->
            <div class="tab-pane fade" id="stage2" role="tabpanel">
                <!-- Campos de etapa 2 -->
                <div class="form-group mt-3">
                    <label for="estado_civil">Estado Civil</label>
                    <select class="form-control" id="estado_civil" name="estado_civil" required>
                        <option value="soltero">Soltero</option>
                        <option value="casado">Casado</option>
                        <option value="viudo">Viudo</option>
                        <option value="divorciado">Divorciado</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" value="{{ old('celular') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo') }}">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button class="btn btn-secondary" type="button" onclick="prevTab('#stage1')">Anterior</button>
                    <button class="btn btn-primary" type="button" onclick="nextTab('#stage3')">Siguiente</button>
                </div>
            </div>

            <!-- Etapa 3 -->
            <div class="tab-pane fade" id="stage3" role="tabpanel">
                <!-- Datos de WhatsApp y contacto de emergencia -->
                <div class="form-group mt-3">
                    <label for="whatsapp">WhatsApp</label>
                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="emergencia_contacto">En caso de emergencia, contactar a</label>
                    <input type="text" class="form-control" id="emergencia_contacto" name="emergencia_contacto" value="{{ old('emergencia_contacto') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="emergencia_telefono">Teléfono de emergencia</label>
                    <input type="text" class="form-control" id="emergencia_telefono" name="emergencia_telefono" value="{{ old('emergencia_telefono') }}">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button class="btn btn-secondary" type="button" onclick="prevTab('#stage2')">Anterior</button>
                    <button class="btn btn-primary" type="button" onclick="nextTab('#stage4')">Siguiente</button>
                </div>
            </div>

            <!-- Etapa 4 -->
            <div class="tab-pane fade" id="stage4" role="tabpanel">
                <div class="form-group mt-3">
                    <label for="ha_visitado_odontologo">¿Ha visitado un odontólogo antes?</label>
                    <select class="form-control" id="ha_visitado_odontologo" name="ha_visitado_odontologo" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button class="btn btn-secondary" type="button" onclick="prevTab('#stage3')">Anterior</button>
                    <button class="btn btn-primary" type="button" onclick="nextTab('#stage5')">Siguiente</button>
                </div>
            </div>

            <!-- Etapa 5 -->
            <div class="tab-pane fade" id="stage5" role="tabpanel">
                <h2>Evaluación Sistémica del Paciente</h2>

                <h3>1. Historia de la Presente Enfermedad</h3>
                <textarea class="form-control" name="historia_enfermedad" rows="3" placeholder="Describa la historia de la presente enfermedad">{{ old('historia_enfermedad') }}</textarea>

                <h3>2. Historia Médica Personal</h3>
                <textarea class="form-control" name="historia_medica_personal" rows="3" placeholder="Describa la historia médica personal">{{ old('historia_medica_personal') }}</textarea>

                <h3>3. Antecedentes Médicos Familiares</h3>
                <textarea class="form-control" name="antecedentes_medicos_familiares" rows="3" placeholder="Describa antecedentes médicos familiares">{{ old('antecedentes_medicos_familiares') }}</textarea>

                <h3>Signos Vitales</h3>
                <div class="form-group mt-3">
                    <label for="pa">PA (Presión Arterial)</label>
                    <input type="text" class="form-control" id="pa" name="pa" value="{{ old('pa') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="pulso">Pulso</label>
                    <input type="text" class="form-control" id="pulso" name="pulso" value="{{ old('pulso') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="temperatura">Temperatura (°C)</label>
                    <input type="text" class="form-control" id="temperatura" name="temperatura" value="{{ old('temperatura') }}">
                </div>

                <h3>Evaluación Clínica</h3>
                <h4>Examen Clínico Extraoral</h4>
                <textarea class="form-control" name="examen_extraoral" rows="3" placeholder="Describa el examen clínico extraoral">{{ old('examen_extraoral') }}</textarea>

                <h4>Examen Clínico Intraoral</h4>
                <textarea class="form-control" name="examen_intraoral" rows="3" placeholder="Describa el examen clínico intraoral">{{ old('examen_intraoral') }}</textarea>

                <button type="submit" class="btn btn-success mt-3">Guardar Paciente</button>
            </div>
        </div>
    </form>
</div>

<script>
    function nextTab(tabId) {
        $('.nav-tabs a[href="' + tabId + '"]').tab('show');
    }

    function prevTab(tabId) {
        $('.nav-tabs a[href="' + tabId + '"]').tab('show');
    }
</script>

@endsection
