<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use Livewire\Component;
use Cart;

class IndexPage extends Component
{
    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $key) {
            if ($key->id == $product_id) {
                Cart::instance('wishlist')->remove($key->rowId);
                $this->emitTo('frontend.wishlist.count-page', 'refresh');
                return;
            }
        }
    }

    public function render()
    {
        return view('livewire.frontend.wishlist.index-page')->layout('layouts.base');
    }
}
