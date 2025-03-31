<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartProducts;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        // Lógica para la página de pago (por ejemplo, mostrar el formulario de pago)
        return view('payment');
    }

    public function totalPayment()
    {
        $user = auth()->user();
    
        if (!$user) {
            return redirect()->route('login')->with('message', 'Debes iniciar sesión para realizar el pago.');
        }
    
        // Consulta los productos del carrito directamente desde cart_products
        $cartProducts = DB::table('cart_products')
            ->join('products', 'cart_products.product_id', '=', 'products.id')
            ->where('cart_products.cart_id', $user->cart->id)
            ->select('products.*', 'cart_products.quantity', 'cart_products.price', 'cart_products.image')
            ->get();
    
        // Cálculo del subtotal
        $subtotal = $cartProducts->sum(function ($product) {
            return $product->price * $product->quantity;
        });
    
        // Cálculo de impuestos
        $tax = $subtotal * 0.16;  // ejemplo de impuesto del 16%
        
        // Cálculo del total
        $total = $subtotal + $tax;
    
        // Agregar log de depuración
        \Log::info('Subtotal: ' . $subtotal);
        \Log::info('Tax: ' . $tax);
        \Log::info('Total: ' . $total);
    
        // Pasar los productos y los totales a la vista de pago
        return view('payment', [
            'cartProducts' => $cartProducts,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total
        ]);
    }
}