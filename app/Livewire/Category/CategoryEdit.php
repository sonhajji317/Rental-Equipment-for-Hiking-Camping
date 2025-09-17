<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryEdit extends Component
{
    public $category_details, $name, $category_id;
    public function mount($id)
    {
        $this->category_id = $id;
        $this->category_details = Category::find($id);
        $this->name = $this->category_details->name;
    }

    public function editCategory()
    {
        $category = Category::findOrFail($this->category_id);

        $this->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update([
            'name' => $this->name
        ]);

        session()->flash('message', 'Category updated successfully');
        return redirect('categoryList');
    }

    public function render()
    {
        return view('livewire.category.category-edit');
    }
}
