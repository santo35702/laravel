<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;

class AddNewPage extends Component
{
    public $name;
    public $slug;
    public $description;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
            'description' => 'required',
        ]);
    }

    public function storeItem(Request $request)
    {
        $this->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
            'description' => 'required',
        ]);

        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->description = $this->description;
        $category->save();
        $request->session()->flash('status', 'Category Added successfully..!');
    }

    public function render()
    {
        return view('livewire.admin.category.add-new-page')->layout('layouts.admin');
    }
}
