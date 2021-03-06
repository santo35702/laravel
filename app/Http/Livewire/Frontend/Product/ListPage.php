<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;

class ListPage extends Component
{
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = 'default';
        $this->pagesize = 20;
    }

    public function render()
    {
        if ($this->sorting == 'name') {
            $products = Product::orderBy('title', 'asc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'name-desc') {
            $products = Product::orderBy('title', 'desc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price') {
            $products = Product::orderBy('regular_price', 'asc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price-desc') {
            $products = Product::orderBy('regular_price', 'desc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'date') {
            $products = Product::orderBy('created_at', 'asc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'date-desc') {
            $products = Product::orderBy('created_at', 'desc')->paginate($this->pagesize);
        } else {
            $products = Product::paginate($this->pagesize);
        }

        $popular_products = Product::inRandomOrder()->limit(8)->get();
        $sale = Sale::find(1);
        return view('livewire.frontend.product.list-page', ['products' => $products, 'popular_products' => $popular_products, 'sale' => $sale])->layout('layouts.base');
    }
}
