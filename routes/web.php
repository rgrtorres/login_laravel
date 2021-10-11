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

Route::get('/', function(){
    return redirect()->route('admin.login');
});
Auth::routes();

Route::get('/home', function(){
    return redirect()->route('admin.login');
});

/* Clientes */

Route::get('/admin/clientes', [ClientesController::class, 'index'])->name('admin.clientes');

Route::group(['prefix' => '/admin/clientes'], function(){
    Route::get('/adicionar', [ClientesController::class, 'create'])->name('admin.adicionar');
    Route::post('/adicionar/do', [ClientesController::class, 'store'])->name('admin.adicionar.do');
    Route::get('/editar/{id}', [ClientesController::class, 'edit'])->name('admin.editar');
    Route::post('/editar/{id}/do', [ClientesController::class, 'update']);
    Route::get('/deletar/{id}', [ClientesController::class, 'destroy'])->name('admin.clientes.deletar');
});


/* Usuarios */
Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios');
Route::get('/admin/usuarios/adicionar', [UsuarioController::class, 'create'])->name('admin.usuarios.adicionar');
Route::post('/admin/usuarios/adicionar/do', [UsuarioController::class, 'store'])->name('admin.usuarios.adicionar.do');
Route::get('/admin/usuarios/editar/{id}', [UsuarioController::class, 'editar'])->name('admin.usuarios.editar');
Route::post('/admin/usuarios/editar/do/{id}', [UsuarioController::class, 'edit']);
Route::get('/admin/usuarios/deletar/{id}', [UsuarioController::class, 'destroy']);

/* Login && Logout */ 
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::post('/admin/login/do', [AuthController::class, 'login'])->name('admin.login.do');