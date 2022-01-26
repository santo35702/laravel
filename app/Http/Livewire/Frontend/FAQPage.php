<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class FAQPage extends Component
{
    public function render()
    {
        return view('livewire.frontend.f-a-q-page')->layout('layouts.base');
    }
}
