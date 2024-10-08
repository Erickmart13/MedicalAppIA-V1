<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SpecialtyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Obtener usuarios por roles
Route::get('/roles/{roleId}/users', [RoleController::class, 'getUsersByRole']);

 // obtener doctores por especialidades
 Route::get('/specialties/{specialtyId}/users', [SpecialtyController::class, 'getDoctorsBySpecialty']);

 // obtener horarios del medico
 Route::get('/users/{personId}/schedules', [App\Http\Controllers\ScheduleController::class, 'getDoctorsBySchedule']);

 // obtener las especialidades de los doctores 
Route::get('/users/{userId}/specialties', [SpecialtyController::class, 'getSpecialtiesByDoctor']);

// Rutas reportes
Route::get('/reporte-consultorios-pdf', [ReportController::class, 'generatePDF'])->name('reporte.consultorios.pdf');