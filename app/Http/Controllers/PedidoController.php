<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Pedido;
use App\Models\Carrito;
use Illuminate\Http\Request;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    //Mostrar la página de confirmación del pago


    public function confirmarPago()
    {
        // Obtener el carrito del usuario actual desde la base de datos
        $carrito = Carrito::where('user_id', Auth::id())->with('items.plato')->first();

        // Verificar si el carrito está vacío
        if (!$carrito || $carrito->items->isEmpty()) {
            return redirect()->route('carrito.index')->with('error', 'Tu carrito está vacío.');
        }


        // Calcular el total sumando la cantidad * precio de cada item

        $total = $carrito->items->sum(function ($item) {
            return $item->cantidad * $item->precio;
        });

        // Retornar la vista de confirmación del pago, pasando el total
        return view('confirmar-pago', compact('total'));
    }


    public function procesarPago(Request $request)
    {
        // Validar el método de pago
        $request->validate([
            'metodo_pago' => 'required|in:efectivo,nequi',
            'direccion_envio' => 'required|string|max:255', // Validar la dirección de envío
        ]);

        // Usar una transacción para asegurar que todo el proceso sea atómico
        DB::transaction(function () use ($request) {
            // Obtener el carrito del usuario autenticado desde la base de datos
            $carrito = Carrito::where('user_id', auth()->user()->id)->with('items.plato')->first();

            // Verificar si el carrito tiene items
            if (!$carrito || $carrito->items->isEmpty()) {
                return redirect()->route('carrito.index')->with('error', 'Tu carrito está vacío.');
            }


            // Calcular el total
            $total = $carrito->items->sum(function ($item) {
                return $item->cantidad * $item->precio;
            });

            // Crear un nuevo pedido
            $pedido = Pedido::create([
                'user_id' => auth()->user()->id,
                'total' => $total,
                'estado' => 'pendiente',
                'metodo_pago' => $request->input('metodo_pago'),
                'direccion_envio' => $request->direccion_envio,
            ]);

            // Guardar los detalles del pedido
            foreach ($carrito->items as $item) {
                DetallePedido::create([
                    'pedido_id' => $pedido->id,
                    'plato_id' => $item->plato_id,
                    'cantidad' => $item->cantidad,
                    'precio' => $item->precio,
                ]);

                // Obtener el plato de la base de datos
                $plato = Plato::find($item->plato_id);

                // Descontar la cantidad comprada del stock disponible
                if ($plato) {
                    $plato->cantidadDisponible -= $item->cantidad;
                    $plato->save(); // Guardar los cambios
                }
            }

            // Vaciar el carrito después de confirmar el pedido
            $carrito->items()->delete(); // Eliminar items del carrito
            $carrito->delete(); // Eliminar el carrito
        });
        return redirect()->route('pedido-exitoso')->with('success', 'Pedido confirmado con éxito.');
    }


    public function exito()
    {
        return view('pedido-exitoso');
    }

    public function verEstadoPedido()
    {
        // Obtener los pedidos del usuario actual cuyo estado sea diferente a 'finalizado'
        $pedidos = Pedido::where('user_id', Auth::id())
            ->where('estado', '!=', 'finalizado')
            ->get();

        return view('ver-pedido', compact('pedidos'));
    }
}
