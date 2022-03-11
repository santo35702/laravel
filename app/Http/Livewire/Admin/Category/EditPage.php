<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;

class EditPage extends Component
{
    public $name;
    public $slug;
    public $description;

    public function mount($id)
    {
        $category = Category::where('id', $id)->first();
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->description = $category->description;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updateItem(Request $request)
    {
        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->description = $this->description;
        $category->save();
        $request->session()->flash('status', 'Category has been updated successfully..!');
    }

    public function render()
    {
        return view('livewire.admin.category.edit-page')->layout('layouts.admin');
    }
}
