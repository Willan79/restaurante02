<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu');
    }

    public function indexcorriente()
    {
        // Obtener solo los platos de la categoría 'Corriente'
        $platos = Plato::where('categoria', 'Corriente')->get();
        // Pasar los datos a la vista
        return view('menu_corriente', compact('platos'));
    }

    public function indexespecial()
    {
        // Obtener solo los platos de la categoría 'Corriente'
        $platos = Plato::where('categoria', 'Especial')->get();
        // Pasar los datos a la vista
        return view('menu_especial', compact('platos'));
    }

    public function indexejecutivo()
    {
        // Obtener solo los platos de la categoría 'Corriente'
        $platos = Plato::where('categoria', 'Ejecutivo')->get();
        // Pasar los datos a la vista
        return view('menu_ejecutivo', compact('platos'));
    }
}

