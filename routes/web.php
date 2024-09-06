<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ScheduleAssignmentController;
use App\Http\Controllers\Auth\AdditionalInfoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profilePerson', [ProfileController::class, 'editPerson'])->name('profilePerson.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profilePerson', [ProfileController::class, 'updatePerson'])->name('profilePerson.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('additional-info', [AdditionalInfoController::class, 'create'])
    ->name('additional-info.create');

Route::post('additional-info', [AdditionalInfoController::class, 'store'])
    ->name('additional-info.store');

//Rutas especialidades

Route::resource('/specialties', SpecialtyController::class);

//Rutas pacientes
Route::resource('/patients', PatientController::class);

//Rutas doctores
Route::resource('/doctors', DoctorController::class);
// Rutas horarios
Route::resource('/schedules', ScheduleController::class);
// Rutas asignar horarios
Route::resource('/scheduleAssignments', ScheduleAssignmentController::class);
// Rutas citas
Route::get('/miscitas', [App\Http\Controllers\AppointmentController::class, 'index']);
Route::get('/miscitas/{appointment}/show', [App\Http\Controllers\AppointmentController::class, 'show']);
Route::post('/miscitas/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class, 'cancel']);
Route::post('/miscitas/{appointment}/confirm', [App\Http\Controllers\AppointmentController::class, 'confirm']);
Route::post('/miscitas/{appointment}/finished', [App\Http\Controllers\AppointmentController::class, 'finished']);
Route::get('/miscitas/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class, 'formCancel']);

// Rutas reservar citas
Route::get('/bookAppointments/create', [App\Http\Controllers\AppointmentController::class, 'create']);
Route::post('/bookAppointments', [App\Http\Controllers\AppointmentController::class, 'store']);


// // Rutas reservar citas
// Route::resource('/bookAppointments', AppointmentController::class);
