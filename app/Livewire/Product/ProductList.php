<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $product = Product::with('category')->find($id);
        $product->delete();

        session()->flash('message', 'Delete product successfully');
        return $this->redirect('productList', navigate: true);
    }

    public function render()
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(10);
        return view('livewire.product.product-list', compact('products'));
    }
}
