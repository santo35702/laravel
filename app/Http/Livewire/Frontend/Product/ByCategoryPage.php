<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class ByCategoryPage extends Component
{
    public function render()
    {
        return view('livewire.frontend.product.by-category-page')->layout('layouts.base');
    }
}
