<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class CheckoutPage extends Component
{
    public function render()
    {
        return view('livewire.frontend.checkout-page')->layout('layouts.base');
    }
}
