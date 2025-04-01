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
        $user = auth()->user(); // Obtener el usuario autenticado
    
        if (!$user) {
            return response()->json(['message' => 'Debes iniciar sesión para agregar productos al carrito'], 401);
        }
    
        $product = Product::find($productId); // Obtener el producto
        
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
    
        $cart = $user->cart()->firstOrCreate([]); // Crear o encontrar el carrito del usuario
        
        $cartProduct = $cart->products()->where('product_id', $productId)->first();
    
        if ($cartProduct) {
            $cart->products()->updateExistingPivot($productId, [
                'quantity' => $cartProduct->pivot->quantity + $quantity
            ]);
        } else {
            $cart->products()->attach($productId, [
                'quantity' => $quantity,
                'price' => $product->price,
                'image' => $product->image,
            ]);
        }
    
        return response()->json(['message' => 'Producto agregado al carrito']);
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
    
        $cart->products()->updateExistingPivot($productId, [
            'quantity' => $request->quantity
        ]);
    
        return response()->json(['success' => true, 'message' => 'Cantidad actualizada']);
    }

    // Eliminar producto del carrito
    public function removeFromCart($productId)
    {
        $user = auth()->user(); // Obtener el usuario autenticado
        
        // Verifica si el usuario está autenticado
        if (!$user) {
            return response()->json(['message' => 'Debes iniciar sesión'], 401);
        }

        $cart = $user->cart()->first(); // Obtener el carrito del usuario

        // Verifica si el carrito existe y si el producto está en el carrito
        if (!$cart || !$cart->products()->where('product_id', $productId)->exists()) {
            return response()->json(['message' => 'Producto no encontrado en el carrito'], 404);
        }

        // Elimina el producto del carrito
        $cart->products()->detach($productId);

        return response()->json(['message' => 'Producto eliminado del carrito']);
    }
}