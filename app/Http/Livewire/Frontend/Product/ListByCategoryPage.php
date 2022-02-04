<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class ListByCategoryPage extends Component
{
    public function render()
    {
        return view('livewire.frontend.product.list-by-category-page')->layout('layouts.base');
    }
}
