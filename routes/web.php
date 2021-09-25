<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin', [AuthController::class, 'index'])->name('admin');
Route::get('/admin/clientes/adicionar', [TarefasController::class, 'adicionar'])->name('admin.adicionar');

/* Usuarios */
Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios');
Route::get('/admin/usuarios/adicionar', [UsuarioController::class, 'create'])->name('admin.usuarios.adicionar');
Route::post('/admin/usuarios/adicionar/do', [UsuarioController::class, 'store'])->name('admin.usuarios.adicionar.do');
Route::get('/admin/usuarios/editar/{id}', [UsuarioController::class, 'editar'])->name('admin.usuarios.editar');
Route::post('/admin/usuarios/editar/do/{id}', [UsuarioController::class, 'editar_store'])->name('admin.usuarios.editar_store');
Route::get('/admin/usuarios/deletar/{id}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.deletar');

/* Login && Logout */
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::post('/admin/login/do', [AuthController::class, 'login'])->name('admin.login.do');
