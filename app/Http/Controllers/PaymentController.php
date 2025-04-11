<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartProducts;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class PaymentController extends Controller
{
    public function index()
    {
        // Lógica para la página de pago (por ejemplo, mostrar el formulario de pago)
        return view('payment');
    }

    public function totalPayment(Request $request)
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
        $tax = $subtotal * 0.16;
    
        // Cálculo del total
        $total = $subtotal + $tax;
    
        if ($request->ajax()) {
            // Si la solicitud es AJAX, devolver los valores en formato JSON
            return response()->json([
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total
            ]);
        }
    
        // Si no es una solicitud AJAX, continuar con la lógica estándar
        return view('payment', [
            'cartProducts' => $cartProducts,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total
        ]);
    }

    public function getCartSummary()
    {
        $user = auth()->user();
        
        if (!$user) {
            return redirect()->route('home')->with('error', 'Debes iniciar sesión.');
        }
    
        $cartProducts = DB::table('cart_products')
            ->join('products', 'cart_products.product_id', '=', 'products.id')
            ->where('cart_products.cart_id', $user->cart->id)
            ->select('products.*', 'cart_products.quantity', 'cart_products.price', 'cart_products.image')
            ->get();
    
        $subtotal = $cartProducts->sum(function ($product) {
            return $product->price * $product->quantity;
        });
        $tax = $subtotal * 0.16; // Impuesto 16%
        $total = $subtotal + $tax;
    
        // 🔹 Enviar los valores a la vista sin JSON
        return view('payment', compact('subtotal', 'tax', 'total'));
    }

    public function processPayment(Request $request)
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
        $tax = $subtotal * 0.16;
        
        // Cálculo del total
        $total = $subtotal + $tax;
    
        // Crear una nueva orden e incluir el nombre del usuario
        $order = Order::create([
            'user_id' => $user->id,
            'nombre' => $user->name, // Asegúrate de que el modelo User tiene el campo name
            'total' => $total,
        ]);
    
        // Asociar los productos con la orden
        foreach ($cartProducts as $product) {
            $order->products()->attach($product->id, [
                'cantidad' => $product->quantity,
                'precio_unitario' => $product->price, // <-- Cambio aquí
            ]);
        }
    
        // Vaciar el carrito después de la compra
        $user->cart->products()->detach(); // Vacía todos los productos del carrito
    
        // Redirigir a una página de confirmación o mostrar un mensaje de éxito
        return back()->with('success', 'Pago procesado con éxito!');
    }
}