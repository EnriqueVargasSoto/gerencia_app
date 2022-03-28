<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\ObjetivoController;
use App\Http\Controllers\Admin\MetasCobitResultantesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//usuario
Route::get('usuarios', [UserController::class, 'index'])->name('usuario.index');
Route::post('crear-usuario', [UserController::class, 'store'])->name('crear.usuario');
Route::put('editar-usuario/{id}', [UserController::class, 'update'])->name('editar.usuario');
Route::get('inactivar-usuario/{id}', [UserController::class, 'inactivar'])->name('inactivar.usuario');

//empresa
Route::get('empresas', [EmpresaController::class, 'index'])->name('empresa.index');
Route::post('crear-empresa', [EmpresaController::class, 'store'])->name('crear.empresa');
Route::put('editar-empresa/{id}', [EmpresaController::class, 'update'])->name('editar.empresa');
Route::get('inactivar-empresa/{id}', [EmpresaController::class, 'inactivar'])->name('inactivar.empresa');

//objetivos
Route::get('objetivos-estrategicos', [ObjetivoController::class, 'index'])->name('objetivo.index');
Route::post('crear-objetivo', [ObjetivoController::class, 'store'])->name('crear.objetivo');
Route::put('editar-objetivo/{id}', [ObjetivoController::class, 'update'])->name('editar.objetivo');
Route::get('inactivar-objetivo/{id}', [ObjetivoController::class, 'inactivar'])->name('inactivar.objetivo');

//metas resultantes
Route::get('mapa-objetivos-vd-metas', [MetasCobitResultantesController::class, 'index'])->name('objetivos.vs.metas');