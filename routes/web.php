<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EmpleadoController;
use \App\Http\Controllers\FacturaController;
use \App\Http\Controllers\ClienteController;

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
    return view('acceso');
})->name("main");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*METEMOS TODAS LAS RUTAS QUE PARA QUE ACCEDAN NECESITEN QUE ESTÉ AUTENTIFICADO*/
Route::middleware('auth')->group(function () {
    Route::get('empleados/idiomas/{id}', [EmpleadoController::class, "get_idiomas"]);
    Route::get('clientes/facturas/{id}', [ClienteController::class, "get_factura"]);/*habra que crear los metodos en el contralor*/
    Route::get('facturas/clientes/{id}', [FacturaController::class, "get_clientes"]);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*METEMOS TODAS LAS RUTAS QUE PARA QUE ACCEDAN NECESITEN QUE ESTÉ AUTENTIFICADO*/
    Route::resource("clientes", ClienteController::class);
    Route::resource("facturas", FacturaController::class);
    Route::resource("empleados", EmpleadoController::class);
});

require __DIR__ . '/auth.php';
