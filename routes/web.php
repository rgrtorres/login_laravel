<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\NumeroPreferencias;
use App\Http\Controllers\NumerosController;
use Faker\Core\Number;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/admin', function () {
    return redirect()->route('admin.clientes');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Clientes */
Route::get('/admin/clientes', [ClientesController::class, 'index'])->name('admin.clientes');
Route::get('/admin/clientes/adicionar', [ClientesController::class, 'create'])->name('admin.adicionar');
Route::post('/admin/clientes/adicionar/do', [ClientesController::class, 'store'])->name('admin.adicionar.do');
Route::get('/admin/clientes/editar/{id}', [ClientesController::class, 'edit'])->name('admin.editar');
Route::post('/admin/clientes/editar/{id}/do', [ClientesController::class, 'update']);
Route::get('/admin/clientes/deletar/{id}', [ClientesController::class, 'destroy'])->name('admin.clientes.deletar');


/* Usuarios */
Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios');
Route::get('/admin/usuarios/adicionar', [UsuarioController::class, 'create'])->name('admin.usuarios.adicionar');
Route::post('/admin/usuarios/adicionar/do', [UsuarioController::class, 'store'])->name('admin.usuarios.adicionar.do');
Route::get('/admin/usuarios/editar/{id}', [UsuarioController::class, 'editar'])->name('admin.usuarios.editar');
Route::post('/admin/usuarios/editar/do/{id}', [UsuarioController::class, 'edit']);
Route::get('/admin/usuarios/deletar/{id}', [UsuarioController::class, 'destroy']);


/* Numeros */
Route::get('/admin/numeros', [NumerosController::class, 'index'])->name('admin.numeros');
Route::get('/admin/numeros/adicionar', [NumerosController::class, 'create'])->name('admin.numeros.adicionar');
Route::post('/admin/numeros/adicionar/do', [NumerosController::class, 'store'])->name('admin.numeros.do');
Route::get('/admin/numeros/editar/{id}', [NumerosController::class, 'edit']);
Route::post('/admin/numeros/editar/{id}/do', [NumerosController::class, 'update']);
Route::get('/admin/numeros/deletar/{id}', [NumerosController::class, 'destroy']);

/* Preferencias */
Route::get('/admin/preferencias', [NumeroPreferencias::class, 'index'])->name('admin.preferencias');
Route::get('/admin/preferencias/editar/{id}', [NumeroPreferencias::class, 'edit']);
Route::post('/admin/preferencias/editar/{id}/do', [NumeroPreferencias::class, 'update']);

/* Login && Logout */
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::post('/admin/login/do', [AuthController::class, 'login'])->name('admin.login.do');
