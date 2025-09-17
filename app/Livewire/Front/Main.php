<?php

namespace App\Livewire\Front;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public function render()
    {
        $product1 = Product::with('category')
            ->latest()
            ->skip(8)
            ->take(4)
            ->get();

        $product2 = Product::with('category')
            ->latest()
            ->skip(12)
            ->take(4)
            ->get();

        $product3 = Product::with('category')
            ->latest()
            ->skip(16)
            ->take(4)
            ->get();

        return view('livewire.front.main', compact('product1', 'product2', 'product3'));
    }
}
