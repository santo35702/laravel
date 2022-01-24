<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.frontend.home-page')->layout('layouts.base');
    }
}
