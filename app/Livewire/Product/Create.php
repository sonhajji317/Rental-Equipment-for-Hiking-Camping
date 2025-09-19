<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name, $category_id, $price, $description, $stock, $start_rent, $end_rent, $image, $status;

    public function addProduct()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:1',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:1',
            'status' => 'required|in:available,rented',
            // 'start_rent' => 'required|date|after_or_equal:today',
            // 'end_rent' => 'required|date|after:start_rent',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($this->image) {
            $path = $this->image->store('products', 'public');
        }

        Product::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'description' => $this->description,
            'stock' => $this->stock,
            'status' => $this->status,
            // 'start_rent' => $this->start_rent,
            // 'end_rent' => $this->end_rent,
            'image' => $path
        ]);

        session()->flash('message', 'Product added successfully.');
        return $this->redirect('productList', navigate: true);
    }

    public function render()
    {
        $categories = Category::all();
        $products = Product::with('category')->get();
        return view('livewire.product.create', compact('categories', 'products'));
    }
}
