<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Cart;

class DetailsPage extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function AddToCart(Request $request, $id, $title, $price)
    {
        Cart::instance('cart')->add($id, $title, 1, $price)->associate('App\Models\Product');
        $request->session()->flash('status', 'Product Add to Cart successfully...!!');
        return redirect()->route('cart');
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $related_product = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(10)->get();
        $sale = Sale::find(1);
        return view('livewire.frontend.product.details-page', ['product' => $product, 'related_product' => $related_product, 'sale' => $sale])->layout('layouts.base');
    }
}
