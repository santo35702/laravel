<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Cart;

class IndexPage extends Component
{
    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = 'default';
        $this->pagesize = 20;

        $this->min_price = 0;
        $this->max_price = 2000;
    }

    public function AddToCart(Request $request, $id, $title, $price)
    {
        Cart::instance('cart')->add($id, $title, 1, $price)->associate('App\Models\Product');
        $request->session()->flash('status', 'Product Add to Cart successfully...!!');
        return redirect()->route('cart');
    }

    public function render()
    {
        if ($this->sorting == 'name') {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('title', 'asc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'name-desc') {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('title', 'desc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price') {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price', 'asc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price-desc') {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price', 'desc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'date') {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at', 'asc')->paginate($this->pagesize);
        } elseif ($this->sorting == 'date-desc') {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at', 'desc')->paginate($this->pagesize);
        } else {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);
        }

        $popular_products = Product::inRandomOrder()->limit(8)->get();
        $sale = Sale::find(1);
        return view('livewire.frontend.product.index-page', ['products' => $products, 'popular_products' => $popular_products, 'sale' => $sale])->layout('layouts.base');
    }
}
