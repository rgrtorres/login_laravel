<?php
namespace App\Services;

use App\{Clientes, Numbers, Usuarios};
use Illuminate\Support\Facades\DB;

class Deletar {
    public function usuario(int $id) {
        DB::transaction(function () use ($id) {
            $usuario = Usuarios::find($id);
            $usuario->delete();
        });
    }

    public function cliente(int $id) {
        DB::transaction(function () use ($id) {
            $cliente = Clientes::find($id);
            $cliente->delete();
        });
    }

    public function numeros(int $id) {
        DB::transaction(function () use($id) {
            $numero = Numbers::find($id);
            $numero->delete();
        });
    }
}
