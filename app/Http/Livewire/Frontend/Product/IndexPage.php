<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;

class IndexPage extends Component
{
    public function render()
    {
        $products = Product::paginate(20);
        $popular_products = Product::inRandomOrder()->limit(5)->get();
        return view('livewire.frontend.product.index-page', ['products' => $products, 'popular_products' => $popular_products])->layout('layouts.base');
    }
}
