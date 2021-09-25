<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarefasController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function adicionar() {
        return view('admin.clientes.adicionar');
    }
}
