<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\StudentController;
Route::get('/', function () {
    return view('welcome');
});

// Ruta que muestra el formulario para crear un nuevo mensaje
Route::get('/mensaje', [MensajeController::class, 'create'])->name('mensaje.create');

// Guardar mensaje
Route::post('/mensaje', [MensajeController::class, 'store'])->name('mensaje.store');

// Mostrar muro de mensajes
Route::get('/muro', [MensajeController::class, 'index'])
    ->middleware('auth')    // Protege la ruta para usuarios autenticados
    ->name('mensaje.index');

// Ruta de administración protegida con middleware 'auth'
Route::middleware(['auth'
])->group(function () {
   Route::get('/admin/dashboard', function () {
       return view('admin.dashboard');
   })->name('admin.dashboard');

   Route::get('/admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'create']
   )->name('admin.users.create');

   Route::post('/admin/users/store', [App\Http\Controllers\Admin\UserController::class, 'store']
   )->name('admin.users.store');
});

// Rutas generadas por Jetstream para autenticación y dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// Ruta que muestra el formulario para crear un nuevo student
Route::get('/student', [StudentController::class, 'create'])->name('student.create');

// Guardar alumno
Route::post('/student', [StudentController::class, 'store'])->name('student.store');

// Mostrar muro de alumnos
Route::get('/muro', [StudentController::class, 'index'])
    ->middleware('auth')    // Protege la ruta para usuarios autenticados
    ->name('mensaje.index');
// CRUD USERS - AHORA CON Route::resource
Route::middleware(['auth'])
    ->group(function () {
  
        Route::resource('student', StudentController::class);
    });