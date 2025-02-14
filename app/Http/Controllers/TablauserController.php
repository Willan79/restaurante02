<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TablauserController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios de la base de datos
        //$usuarios = User::all();
        $usuarios = User::where('email', '!=', 'asaderopijapariente@hotmail.com')->get();

        // Pasar los datos de los usuarios a la vista
        return view('admin.tabla-user', compact('usuarios'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Eliminar la imagen si existe
        if ($user->imagen) {
            Storage::delete('public/' . $user->imagen);
        }

        // Eliminar el plato
        $user->delete();

        return redirect()->back()->with('success', 'El usuario ha sido eliminado con éxito');
    }
}
