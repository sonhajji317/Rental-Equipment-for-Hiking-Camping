<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Related extends Component
{
    public $product_id, $category_id;

    public function render()
    {

        $products = Product::with('category')
            ->where('category_id', $this->category_id)
            ->where('id', '!=', $this->product_id) // Exclude the current product
            ->inRandomOrder()
            ->take(4)
            ->get();
        return view('livewire.product.related', compact('products'));
    }
}
