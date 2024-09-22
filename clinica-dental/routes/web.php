<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\UserController; // Importamos el controlador UserController
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aquí es donde puedes registrar las rutas web para tu aplicación.
| Estas rutas están cargadas por el RouteServiceProvider y se agrupan
| en el grupo "web" middleware. ¡Haz algo grandioso!
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas protegidas por roles

// Rutas para Administrador
Route::middleware(['auth', 'role:Administrador'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Gestión de Usuarios
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
    Route::get('/admin/create-user', [AdminController::class, 'createUserForm'])->name('admin.createUserForm');
    Route::post('/admin/create-user', [AdminController::class, 'createUser'])->name('admin.createUser');

    // Rutas para gestionar usuarios con UserController
    Route::resource('users', UserController::class);

    // Gestión de Pacientes
    Route::get('/admin/new-patient', [AdminController::class, 'newPatientForm'])->name('admin.newPatientForm');
    Route::post('/admin/new-patient', [AdminController::class, 'createPatient'])->name('admin.createPatient');

    // Gestión de Médicos
    Route::get('/admin/new-doctor', [AdminController::class, 'newDoctorForm'])->name('admin.newDoctorForm');
    Route::post('/admin/new-doctor', [AdminController::class, 'createDoctor'])->name('admin.createDoctor');

    // Consentimientos y Backups
    Route::get('/admin/consent', [AdminController::class, 'consentForm'])->name('admin.consentForm');
    Route::get('/admin/backup', [AdminController::class, 'backup'])->name('admin.backup');

    // Módulo de Especialidades
    Route::prefix('admin/especialidades')->name('admin.especialidades.')->group(function () {
        Route::get('/', [EspecialidadesController::class, 'index'])->name('index');
        Route::get('/create', [EspecialidadesController::class, 'create'])->name('create');
        Route::post('/', [EspecialidadesController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [EspecialidadesController::class, 'edit'])->name('edit');
        Route::put('/{id}', [EspecialidadesController::class, 'update'])->name('update');
        Route::delete('/{id}', [EspecialidadesController::class, 'destroy'])->name('destroy');
    });
});

// Rutas para Médico
Route::middleware(['auth', 'role:Médico'])->group(function () {
    Route::get('/medico', [MedicoController::class, 'index'])->name('medico.index');
    Route::get('/medico/patients', [MedicoController::class, 'patients'])->name('medico.patients');
    // Otras rutas específicas para Médicos
});

// Rutas compartidas entre Administrador y Médico (acceso a pacientes)
Route::middleware(['auth', 'role:Administrador|Médico'])->group(function () {
    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
    Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
    Route::get('/patients/{patient}', [PatientController::class, 'show'])->name('patients.show');
    Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    Route::put('/patients/{patient}', [PatientController::class, 'update'])->name('patients.update');
    Route::delete('/patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');
});
