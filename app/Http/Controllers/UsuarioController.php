<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Usuarios;
use App\Services\Deletar;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $usuarios = Usuarios::query()->get();
        $mensagem = $request->session()->get('mensagem');
        return view('admin.usuarios.index', compact('usuarios', 'mensagem'));
    }

    public function create() {
        return view('admin.usuarios.adicionar');
    }

    protected function store(Request $request) {
        Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required'
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.usuarios');
    }

    public function editar(Request $request, int $id) {
        $usuario = Usuarios::find($request->id);

        return view('admin.usuarios.editar', compact('usuario'));
    }

    public function edit (Request $request) {
        $usuario = Usuarios::find($request->id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->save();

        $request->session()->flash('mensagem', 'Usuário editado com sucesso');
        return redirect()->route('admin.usuarios');
    }

    protected function destroy(Request $request, int $id, Deletar $deletar) {
        $deletar->usuario($id);
        return redirect()->route('admin.usuarios');
    }
}
