<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productos = Product::inRandomOrder()->take(6)->get();
        $categoria = Product::select('category')->distinct()->inRandomOrder()->first();
        $productoCategoria = Product::where('category', $categoria->category)->inRandomOrder()->first();
        return view('welcome', compact('productos', 'categoria', 'productoCategoria'));
    }
}
