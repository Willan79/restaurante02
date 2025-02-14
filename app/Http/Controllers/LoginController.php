<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Mensaje que pasa a la vista si el usuario no es autenticado
        if(!Auth::attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('mensaje','Credenciales Incorectas');
        }

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin'); // Ruta al panel de administración
        }

        return redirect()->route('menu', Auth::user()->name);
    }
}
