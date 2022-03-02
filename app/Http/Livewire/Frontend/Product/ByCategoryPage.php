<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ByCategoryPage extends Component
{
    public $sorting;
    public $pagesize;
    public $slug;

    public function mount($slug)
    {
        $this->sorting = 'default';
        $this->pagesize = 20;
        $this->slug = $slug;
    }

    public function render()
    {
        $category = Category::where('slug', $this->slug)->first();

        if ($this->sorting == 'name') {
            $products = Product::where('category_id', $category->id)->orderBy('title', 'asc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'name-desc') {
            $products = Product::where('category_id', $category->id)->orderBy('title', 'desc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price') {
            $products = Product::where('category_id', $category->id)->orderBy('regular_price', 'asc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price-desc') {
            $products = Product::where('category_id', $category->id)->orderBy('regular_price', 'desc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'date') {
            $products = Product::where('category_id', $category->id)->orderBy('created_at', 'asc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'date-desc') {
            $products = Product::where('category_id', $category->id)->orderBy('created_at', 'desc')->paginate($this->pagesize);
        } else {
            $products = Product::where('category_id', $category->id)->paginate($this->pagesize);
        }

        $popular_products = Product::inRandomOrder()->limit(8)->get();
        return view('livewire.frontend.product.by-category-page', ['products' => $products, 'popular_products' => $popular_products, 'category' => $category])->layout('layouts.base');
    }
}
