<?php
namespace App\Services;

use App\{Usuarios};
use Illuminate\Support\Facades\DB;

class Deletar {
    public function usuario(int $id) {
        DB::transaction(function () use ($id) {
            $usuario = Usuarios::find($id);
            $usuario->delete();
        });
    }
}
