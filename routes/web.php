<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PromocionalController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ConocidoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\TareaController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/', function () {
    //return view('materias.inicio');
    return redirect('/materias');
});

//Route::get('/', [PromocionalController::class, 'index']);
Route::resource('promocional', PromocionalController::class);

/* Route::get('/', [CalendarController::class, 'index']); */
Route::resource('calendar', CalendarController::class);

Route::resource('conocidos', ConocidoController::class); // acordarse de agregar arriba el use
Route::resource('profesores', ProfesorController::class)->parameters([
    'profesores'=>'profesor' // ruta profesores, parámetro profesor
]);
Route::resource('materias', MateriaController::class);
Route::resource('tareas', TareaController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
