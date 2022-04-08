<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use Livewire\Component;

class CountPage extends Component
{
    protected $listeners = ['refresh'=>'$refresh'];

    public function render()
    {
        return view('livewire.frontend.wishlist.count-page');
    }
}
