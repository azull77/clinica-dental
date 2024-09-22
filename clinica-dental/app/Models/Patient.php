<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_ingreso',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'genero',
        'edad',
        'estado_civil',
        'telefono',
        'celular',
        'correo',
        'whatsapp',
        'emergencia_contacto',
        'emergencia_telefono',
        'ha_visitado_odontologo',
        'historia_enfermedad',
        'historia_medica_personal',
        'antecedentes_medicos_familiares',
        'pa',
        'pulso',
        'temperatura',
        'examen_extraoral',
        'examen_intraoral',
    ];
}

