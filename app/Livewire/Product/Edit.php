<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $product_details, $name, $price, $category_id, $description, $stock, $start_rent, $end_rent, $status, $image, $product_id;

    public function mount($id)
    {
        $this->product_id = $id;
        $product_details = Product::findOrFail($id);
        $this->name = $product_details->name;
        $this->price = $product_details->price;
        $this->category_id = $product_details->category_id;
        $this->description = $product_details->description;
        $this->stock = $product_details->stock;
        $this->start_rent = $product_details->start_rent;
        $this->end_rent = $product_details->end_rent;
        $this->status = $product_details->status;
        $this->image = $product_details->image;
    }

    public function editProduct()
    {
        $product = Product::findOrFail($this->product_id);

        $this->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:1',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:available,rented',
            'start_rent' => 'required|date|after_or_equal:today',
            'end_rent' => 'required|date|after:start_rent',
        ]);

        //ini adalah gambar product yang sudah ada
        $path = $this->image;
        //ini adalah ketika gambar product blm ada maka akan upload gambar baru
        if ($this->image && gettype($this->image) !== 'string') {
            $path = $this->image->store('products', 'public');
        }

        $product->update([
            'name'        => $this->name,
            'category_id' => $this->category_id,
            'price'       => $this->price,
            'description' => $this->description,
            'stock'       => $this->stock,
            'status'      => $this->status,
            'start_rent'  => $this->start_rent,
            'end_rent'    => $this->end_rent,
            'image' => $path,
        ]);

        session()->flash('message', 'Product update successfully');
        return redirect('productList');
    }

    public function render()
    {
        $categories = Category::all();
        $products = Product::with('category')->find($this->product_details->id ?? null);
        return view('livewire.product.edit', compact('products', 'categories'));
    }
}
