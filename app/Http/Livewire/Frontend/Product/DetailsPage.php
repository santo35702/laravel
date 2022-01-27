<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class DetailsPage extends Component
{
    public function render()
    {
        return view('livewire.frontend.product.details-page')->layout('layouts.base');
    }
}
