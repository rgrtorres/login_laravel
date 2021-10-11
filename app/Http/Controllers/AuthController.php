<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Foundation\Validation\ValidatesRequests;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('admin.index');
        }

        return redirect()->route('admin.login');
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.clientes');
        }

        return view('admin.login.index');
    }

    public function login(Request $request)
    {
        $credenciais = [
            'name' => $request->name,
            'password' => $request->password
        ];


        if (Auth::attempt($credenciais)) {
            return redirect()->route('admin.clientes');
        }

        return redirect()
                        ->back()
                        ->withInput($request->input())
                        ->withErrors(['Os dados informados não conferem']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
