<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TablaplatosController extends Controller
{
    public function index()
    {
        $platos = Plato::all(); // Obtiene todos los platos de la base de datos
        return view('admin.tabla-platos', compact('platos')); // Envía los platos a la vista
    }

    // Mostrar el formulario para editar un plato existente
    public function edit($id)
    {
        $plato = Plato::findOrFail($id); // Buscar el plato por ID
        return view('admin.editar_platos', compact('plato')); // Mostrar el formulario de editar plato
    }

    // Actualizar los datos de un plato existente
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $this->validate($request, [
            'categoria' => 'required|string|max:255',
            'nombre_plato' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'cantidadDisponible' => 'required|integer|min:1',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Buscar el plato por ID
        $plato = Plato::findOrFail($id);

        // Manejar la subida de una nueva imagen (si se proporciona una nueva)
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($plato->imagen) {
                Storage::delete('public/' . $plato->imagen);
            }
            // Subir la nueva imagen
            $imagePath = $request->file('imagen')->store('imagenes_platos', 'public');
            $plato->imagen = $imagePath;
        }
        // Actualizar los datos del plato
        $plato->categoria = $request->categoria;
        $plato->nombre_plato = $request->nombre_plato;
        $plato->descripcion = $request->descripcion;
        $plato->precio = $request->precio;
        $plato->cantidadDisponible = $request->cantidadDisponible;

        // Guardar los cambios en la base de datos
        $plato->save();

        // Redirigir a una página o mostrar un mensaje de éxito
        return redirect()->route('tabla-platos', $plato->id)->with('success', 'Plato actualizado con éxito');
    }

    public function destroy($id)
    {
        $plato = Plato::findOrFail($id);

        // Eliminar la imagen si existe
        if ($plato->imagen) {
            Storage::delete('public/' . $plato->imagen);
        }

        // Eliminar el plato
        $plato->delete();

        return redirect()->back()->with('success', 'El plato ha sido eliminado con éxito');
    }
}
