<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Muda a rota pra AuthController@index ao invés de dashboard pra seguir o padrão REST (index, show, update, create, delete...)
    public function index()
    {
        if (Auth::check()) {
            return view('admin.dashboard');
        }

        return redirect()->route('admin.login');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credenciais = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (Auth::attempt($credenciais)) {
            return redirect()->route('admin');
        }

        return redirect()
                        ->back()
                        ->withInput()
                        ->withErrors(['Os dados informados não conferem']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
