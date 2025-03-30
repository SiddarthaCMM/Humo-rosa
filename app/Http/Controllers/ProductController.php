<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Muestra una lista de productos.
     */
    public function showCatalog()
    {
        $products = Product::all(); // O cualquier otro método que utilices para obtener los productos
        return view('catalogue', compact('products'));
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        return view('create'); // Muestra el formulario de creación
    }

    /**
     * Guarda un nuevo producto en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'ingredients' => 'nullable|string',
            'aroma' => 'nullable|string',
            'Contenido' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240' // 10MB max
        ]);
    
        // Subir la imagen si existe
        if ($request->hasFile('image')) {
            // Guardar la imagen en public/images
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }
    
        // Crear el producto en la base de datos
        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'ingredients' => $request->ingredients,
            'aroma' => $request->aroma,
            'Contenido' => $request->Contenido,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath, // Guardar la ruta de la imagen
        ]);
    
        // Redirigir a la página de creación (o cualquier otra página)
        return redirect()->route('create'); // o simplemente 'create' si no tienes una ruta con nombre
    }

    /**
     * Muestra un producto específico.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Muestra el formulario para editar un producto existente.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Actualiza un producto en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'ingredients' => 'nullable|string',
            'aroma' => 'nullable|string',
            'Contenido' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|url',
            'stock' => 'required|integer|min:0'
        ]);
    
        $product = Product::findOrFail($id);
        $product->update($request->all());
    
        return redirect()->route('products.index')->with('success', 'Producto actualizado con éxito.');
    }

    /**
     * Elimina un producto de la base de datos.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado con éxito.');
    }
}