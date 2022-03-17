<?php

namespace App\Http\Livewire\Admin\Home;

use Livewire\Component;
use App\Models\HomeCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryPage extends Component
{
    public $category_id = [];
    public $no_of_products;

    public function mount()
    {
        $category = HomeCategory::find(1);
        $this->category_id = explode(',', $category->category_id);
        $this->no_of_products = $category->no_of_products;
    }

    public function updateItem(Request $request)
    {
        $category = HomeCategory::find(1);
        $category->category_id = implode(',',$this->category_id);
        $category->no_of_products = $this->no_of_products;
        $category->save();
        $request->session()->flash('status', 'New Arrivals with Category has been updated successfully!');
    }

    public function render()
    {
        $new_arrival_cat = HomeCategory::find(1);
        $new_arrival_cat_id = explode(',', $new_arrival_cat->category_id);
        $new_arrival = Category::whereIn('id', $new_arrival_cat_id)->get();
        return view('livewire.admin.home.category-page', ['new_arrival' => $new_arrival])->layout('layouts.admin');
    }
}
