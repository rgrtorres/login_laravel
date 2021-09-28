<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Numbers;
use App\Services\Deletar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClientesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $clientes = Clientes::query()->get();
        $mensagem = $request->session()->get('mensagem');

        return view('admin.clientes.index', compact('clientes', 'mensagem'));
    }

    public function create() {
        return view('admin.clientes.adicionar');
    }

    public function store(Request $request) {
        $data = [
            'user_id' => Auth::User()->id,
            'name' => $request->name,
            'document' => $request->document
        ];

        Validator::make($request->all(), [
            'name'      => 'required',
            'document'  => 'required|max:12|min:6'
        ])->validate();

        Clientes::create($data);

        $request->session()->flash("mensagem", "Cliente registrado com sucesso!");
        return redirect()->route('admin.clientes');
    }

    public function edit(Request $request, int $id) {
        $cliente = Clientes::find($request->id);
        return view('admin.clientes.editar', compact('cliente'));
    }

    public function update(Request $request) {
        $cliente = Clientes::find($request->id);
        $cliente->name = $request->name;
        $cliente->document = $request->document;
        $cliente->status = $request->status;
        $cliente->save();

        Validator::make($request->all(), [
            'name'      => 'required',
            'document'  => 'required|max:12|min:6',
            'status'    =>  'required'
        ])->validate();

        $request->session()->flash('mensagem', 'Cliente editado');
        return redirect()->route('admin.clientes');
    }

    protected function destroy(Request $request, int $id, Deletar $deletar) {
        $deletar->cliente($id);
        $request->session()->flash('mensagem', 'Deletado com sucesso!');
        return redirect()->route('admin.clientes');
    }
}
