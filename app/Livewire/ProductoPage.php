<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Producto;
use App\Models\ProductView;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProductoPage extends Component
{

    public function render()
    {
        $categorias = Category::all();
        $productos = Producto::all();

        // Consulta para obtener los productos más vistos
        $popularProducts = ProductView::select('product_id', DB::raw('COUNT(*) as views'))
            ->groupBy('product_id')
            ->orderByDesc('views')
            ->take(10) // Obtener los 10 productos más vistos
            ->get();

        // Obtener los nombres de los productos más vistos
        $productNames = $popularProducts->pluck('product_id');
        $productViews = $popularProducts->pluck('views');

        return view('pages.home-page', compact('productos', 'categorias', 'productNames', 'productViews'));
    }

    public function recordView($productId)
    {
        ProductView::create([
            'user_id' => Auth::id(), // Obtener el usuario autenticado
            'product_id' => $productId, // ID del producto visto
            'viewed_at' => now(), // Fecha y hora actual
        ]);
    }
}
