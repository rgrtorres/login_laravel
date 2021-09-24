<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard() {
        if(Auth::check() == true) {
            return view('admin.dashboard');
        }

        return redirect()->route('admin.login');
    }

    public function showLoginForm() {
        return view('admin.login');
    }

    public function login(Request $request) {
        var_dump($request->all());

        $credenciais = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if(Auth::attempt($credenciais)) {
            return redirect()->route('admin');
        }

        return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem']); //devolve o email no campo
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
