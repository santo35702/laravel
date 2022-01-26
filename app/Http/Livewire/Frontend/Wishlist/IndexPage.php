<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use Livewire\Component;

class IndexPage extends Component
{
    public function render()
    {
        return view('livewire.frontend.wishlist.index-page')->layout('layouts.base');
    }
}
