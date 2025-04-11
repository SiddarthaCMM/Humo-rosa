<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Agregar producto al carrito
    public function addToCart($productId, $quantity)
    {
        \Log::info('ID recibido en Laravel:', ['productId' => $productId, 'quantity' => $quantity]);
        $user = auth()->user(); // Obtener el usuario autenticado
        
        $product = Product::find($productId); // Obtener el producto
        
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
    
        // Obtener el carrito del usuario
        $cart = $user->cart()->first(); 
    
        if (!$cart) {
            return response()->json(['message' => 'Carrito no encontrado'], 404);
        }
    
        // Verificar si el producto ya está en el carrito
        $cartProduct = $cart->products()->where('product_id', $productId)->first();
    
        if ($cartProduct) {
            // Si el producto ya está en el carrito, actualizamos la cantidad
            $cart->products()->updateExistingPivot($productId, [
                'quantity' => $cartProduct->pivot->quantity + $quantity
            ]);
        } else {
            // Si el producto no está en el carrito, lo agregamos
            $cart->products()->attach($productId, [
                'quantity' => $quantity,
                'price' => $product->price,
                'image' => $product->image,
            ]);
        }
    
        return redirect('/catalogue')->with('success', 'Pago procesado con éxito!');
    }

    // Mostrar carrito
    public function showCart()
    {
        $user = auth()->user();
    
        if (!$user) {
            return redirect()->route('login')->with('message', 'Debes iniciar sesión para ver tu carrito.');
        }
    
        // Consulta los productos del carrito directamente desde cart_products
        $cartProducts = DB::table('cart_products')
            ->join('products', 'cart_products.product_id', '=', 'products.id')
            ->where('cart_products.cart_id', $user->cart->id)
            ->select('products.*', 'cart_products.quantity', 'cart_products.price', 'cart_products.image')
            ->get();

    
        return view('catalogue', ['cartProducts' => $cartProducts]);
    }

    public function updateCart(Request $request, $productId)
    {
        $user = auth()->user();
        
        if (!$user) {
            return response()->json(['message' => 'Debes iniciar sesión'], 401);
        }
    
        $cart = $user->cart()->first();
        $cartProduct = $cart->products()->where('product_id', $productId)->first();
    
        if (!$cartProduct) {
            return response()->json(['message' => 'Producto no encontrado en el carrito'], 404);
        }
    
        // Actualizar la cantidad del producto
        $cart->products()->updateExistingPivot($productId, [
            'quantity' => $request->quantity
        ]);
    
        return response()->json(['success' => true, 'message' => 'Cantidad actualizada']);
    }

    public function removeFromCart(Request $request, $productId)
    {
        $user = auth()->user();
    
        if (!$user) {
            return response()->json(['message' => 'Debes iniciar sesión'], 401);
        }
    
        $cart = $user->cart()->first();
        $cartProduct = $cart->products()->where('product_id', $productId)->first();
    
        if (!$cartProduct) {
            return response()->json(['message' => 'Producto no encontrado en el carrito'], 404);
        }
    
        // Eliminar el producto del carrito
        $cart->products()->detach($productId);
    
        return response()->json(['success' => true, 'message' => 'Producto eliminado del carrito']);
    }
}