<?php

// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        // Validación de los datos (productos, cantidades, etc)
        $validatedData = $request->validate([
            'productos' => 'required|array',
            'productos.*.id' => 'required|exists:products,id',
            'productos.*.cantidad' => 'required|integer|min:1',
        ]);

        // Obtener el usuario logueado
        $user = Auth::user();

        // Crear la orden
        $order = new Order();
        $order->user_id = $user->id;
        $order->total = 0; // El total lo calcularemos más tarde
        $order->save();

        $total = 0;

        // Crear los productos en la orden
        foreach ($validatedData['productos'] as $producto) {
            $product = Product::find($producto['id']);

            // Calcular el total del pedido
            $itemTotal = $product->price * $producto['cantidad'];
            $total += $itemTotal;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $producto['id'],
                'quantity' => $producto['cantidad'],
                'price' => $product->price,
                'total' => $itemTotal,
            ]);
        }

        // Actualizar el total de la orden
        $order->total = $total;
        $order->save();

        // Redirigir a un controlador de pago o una página de confirmación
        return redirect()->route('payment.index', ['order' => $order]);
    }
}