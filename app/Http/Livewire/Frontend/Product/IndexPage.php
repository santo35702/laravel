<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class IndexPage extends Component
{
    public function render()
    {
        return view('livewire.frontend.product.index-page')->layout('layouts.base');
    }
}
