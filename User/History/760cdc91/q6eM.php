<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductTable extends Component
{
    public function render()
    {
        // Fetch products and count
        $products = Product::paginate(20); // Paginate 20 products per page
        $products_count = Product::count(); // Get the total count of products

        return view('livewire.product-table', [
            'products' => $products,
            'products_count' => $products_count,
        ]);
    }
}
