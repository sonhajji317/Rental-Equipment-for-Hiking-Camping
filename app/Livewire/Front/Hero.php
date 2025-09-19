<?php

namespace App\Livewire\Front;

use App\Models\Product;
use Livewire\Component;

class Hero extends Component
{
    public function placeholder()
    {
        return view('livewire.skeleton');
    }

    public function render()
    {
        $products = Product::with('category')
            ->latest()
            ->take(8)
            ->get();

        return view('livewire.front.hero', compact('products'));
    }
}
