<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;

class CountPage extends Component
{
    protected $listeners = ['refresh'=>'$refresh'];

    public function render()
    {
        return view('livewire.frontend.cart.count-page');
    }
}
