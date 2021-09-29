<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;
use App\Numbers;
use App\NumerosPreferencias;
use App\Services\Deletar;
use Illuminate\Support\Facades\Validator;

class NumerosController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }

    function index(Request $request) {
        $numeros = Numbers::join('customers', 'customers.id', '=', 'numbers.customer_id')->get();
        $mensagem = $request->session()->get('mensagem');

        return view("admin.numeros.index", compact('numeros', 'mensagem'));
    }

    function create() {
        return view('admin.numeros.adicionar');
    }

    function store(Request $request) {

        $data = [
            'customer_id'   => $request->customer_id,
            'number'        => $request->number,
        ];

        Validator::make($request->all(), [
            'customer_id'   => 'required',
            'number'        => 'min:8|max:14|required'
        ]);

        $cliente = Clientes::where('id', '=', $request->customer_id)->count();
        if($cliente > 0) {
            Numbers::create($data);

            $numero = Numbers::where('customer_id', '=', $request->customer_id)->first();

            for($r = 0; $r <= 1; $r++) {
                if($r == 0) {
                    $preferencias = [
                        'number_id' => $numero->id,
                        'name'      => 'auto_attendant',
                        'value'     => '1'
                    ];
                    NumerosPreferencias::create($preferencias);
                } else {
                    $preferencias = [
                        'number_id' => $numero->id,
                        'name'      => 'voicemail_enabled ',
                        'value'     => '1'
                    ];
                    NumerosPreferencias::create($preferencias);
                }
            }

            return redirect()->route('admin.numeros');
            $request->session()->flash('mensagem', 'Número cadastrado com sucesso!');
        } else {
            return redirect()
                        ->back()
                        ->withInput($request->input())
                        ->withErrors(['Cliente não encontrado!']);
        }

    }

    public function edit(Request $request) {
        $numero = Numbers::find($request->id);
        return view('admin.numeros.editar', compact('numero'));
    }

    public function update(Request $request, int $id) {
        $numero = Numbers::find($request->id);
        $numero->customer_id = $request->id;
        $numero->number = $request->number;
        $numero->status = $request->status;
        $numero->save();

        Validator::make($request->all(), [
            'number'           => 'required|max:14|min:8',
            'status'           => 'required'
        ])->validate();

        $request->session()->flash('mensagem', 'Cliente editado');
        return redirect()->route('admin.numeros');
    }

    protected function destroy(Request $request, int $id, Deletar $deletar) {
        $deletar->numeros($id);
        $request->session()->flash('mensagem', 'Deletado com sucesso!');
        return redirect()->route('admin.numeros');
    }
}
