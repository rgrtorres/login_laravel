<?php

namespace App\Http\Controllers;

use App\NumerosPreferencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NumeroPreferencias extends Controller
{
    public function index(Request $request) {
        $preferencias = NumerosPreferencias::query()->get();
        $mensagem = $request->session()->get('mensagem');
        return view('admin.preferencias.index', compact('preferencias', 'mensagem'));
    }

    public function edit(Request $request) {
        $preferencia = NumerosPreferencias::find($request->id);
        return view('admin.preferencias.editar', compact('preferencia'));
    }

    public function update(Request $request, int $id) {
        $nPreferencia = NumerosPreferencias::find($request->id);
        $nPreferencia->value = $request->value;
        $nPreferencia->save();

        Validator::make($request->all(), [
            'value'      => 'min:0|max:1|required|numeric'
        ])->validate();

        $request->session()->flash('mensagem', 'Preferencia editada');
        return redirect()->route('admin.preferencias');
    }
}
