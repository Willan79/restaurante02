<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        //Validación
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'apellido' => 'required|string',
            'telefono' => 'required',
            'direccion' => 'required|string',

        ]);
        $role = $request->email === 'asaderopijapariente@hotmail.com' ? 'admin' : 'user';
        // Incertar en la base de datos Equivale a un INSERT
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'role' => $role,
        ]);

        // Autenticar usuario
        Auth::attempt($request->only('email', 'password'), $request->remember);

        //Redireccionar al usuario
        return redirect()->route('menu');
    }
}
