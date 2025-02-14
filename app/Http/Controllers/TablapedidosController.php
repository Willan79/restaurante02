<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class TablapedidosController extends Controller
{
    public function index()
    {
        // Obtener los pedidos con los datos del usuario cuyo estado sea diferente a 'finalizado'
        $pedidos = Pedido::with('user')
            ->where('estado', '!=', 'finalizado')
            ->get();
        return view('admin.tabla-pedidos', compact('pedidos'));
    }

    // Mostrar detalles del pedido
    public function show($id)
    {
        $pedido = Pedido::with('detalles.plato')->findOrFail($id); // Obtener los detalles del pedido
        return view('admin\detalles-pedidos', compact('pedido'));
    }

    // Editar estado del pedido
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('admin.editar-estado', compact('pedido'));
    }

    // Actualizar el estado del pedido
    public function update(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,preparación,enviado,entregado,cancelado,finalizado',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->estado = $request->input('estado');
        $pedido->save();

        return redirect()->route('tabla-pedidos')->with('success', 'Estado del pedido actualizado');
    }
}
