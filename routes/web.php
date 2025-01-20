<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SpecializationController;
use App\Models\Appointment;
use App\Models\PatientReport;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('patients', PatientController::class);
Route::resource('doctors', DoctorController::class)->middleware('role:admin,patient');
Route::resource('appointments', AppointmentController::class)->middleware('role:admin,patient');
Route::resource('schedules', ScheduleController::class)->middleware('role:admin,patient');
Route::resource('specilizations', SpecializationController::class);
Route::resource('patientreports', PatientReportController::class);
Route::get('/viewdoctors',[HomeController::class, 'doctor'])->name('viewdoctors');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
