<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use Illuminate\Http\Request;
use Cart;

class IndexPage extends Component
{
    public function increaseQty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('frontend.cart.count-page', 'refresh');
    }

    public function decreaseQty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('frontend.cart.count-page', 'refresh');
    }

    public function destroy(Request $request, $rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('frontend.cart.count-page', 'refresh');
        $request->session()->flash('status', 'Product removed from Cart successfully..!!');
    }

    public function removeAll(Request $request)
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('frontend.cart.count-page', 'refresh');
        $request->session()->flash('status', 'All Products removed from Cart successfully..!!');
    }

    public function render()
    {
        return view('livewire.frontend.cart.index-page')->layout('layouts.base');
    }
}
