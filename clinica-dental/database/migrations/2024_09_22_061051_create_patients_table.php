<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id(); // N° de expediente
            $table->date('fecha_ingreso');
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');
            $table->enum('genero', ['masculino', 'femenino']);
            $table->integer('edad')->nullable(); // Para calcularla automáticamente
            $table->enum('estado_civil', ['soltero', 'casado', 'viudo', 'divorciado']);
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('correo')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('emergencia_contacto')->nullable();
            $table->string('emergencia_telefono')->nullable();
            $table->boolean('ha_visitado_odontologo'); // 1 para sí, 0 para no

            // Nuevos campos
            $table->text('historia_enfermedad')->nullable();
            $table->text('historia_medica_personal')->nullable();
            $table->text('antecedentes_medicos_familiares')->nullable();
            $table->string('pa')->nullable(); // Presión Arterial
            $table->string('pulso')->nullable();
            $table->string('temperatura')->nullable();
            $table->text('examen_extraoral')->nullable();
            $table->text('examen_intraoral')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
