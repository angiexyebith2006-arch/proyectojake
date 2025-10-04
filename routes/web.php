<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuario\UsuarioController;
use App\Http\Controllers\Transaccion\TransaccionController;
use App\Http\Controllers\Actividad\ActividadController;
use App\Http\Controllers\Visita\VisitaController;
use App\Http\Controllers\Cumpleano\CumpleanoController; //  CORREGIDO

Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuario', UsuarioController::class);


  //   <!-- finanzas -->
Route::resource('finanzas', TransaccionController::class)
     ->names('finanzas')
     ->parameters(['finanzas' => 'transaccion']);

//  Aquí simplificamos con resource
Route::resource('actividades', ActividadController::class)->names('actividades');

// <!--visita -->
Route::resource('seguimiento', VisitaController::class)
     ->names('seguimiento')
     ->parameters(['seguimiento' => 'visita']);



Route::resource('cronograma', CumpleanoController::class)->names('cronograma');


Route::get('/registro', function () {
    return view('registro.persona');
})->name('registro.persona');

Route::get('/contactanos', function () {
    return view('views.contactanos');
})->name('contactanos');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //
});
