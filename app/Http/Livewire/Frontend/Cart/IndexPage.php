<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;

class IndexPage extends Component
{
    public function render()
    {
        return view('livewire.frontend.cart.index-page')->layout('layouts.base');
    }
}
