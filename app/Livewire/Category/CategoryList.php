<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryList extends Component
{
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        session()->flash('message', 'Category deleted successfully');
        return $this->redirect('categoryList', navigate: true);
    }

    public function render()
    {
        $categories = Category::latest()->get();
        return view('livewire.category.category-list', compact('categories'));
    }
}
