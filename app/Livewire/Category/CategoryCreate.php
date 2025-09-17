<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryCreate extends Component
{
    public $category, $name;

    public function addCategory()
    {
        $this->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::create([
            'name' => $this->name
        ]);

        session()->flash('message', 'Category created successfully');
        return $this->redirect('categoryList', navigate: true);
    }

    public function render()
    {
        return view('livewire.category.category-create');
    }
}
