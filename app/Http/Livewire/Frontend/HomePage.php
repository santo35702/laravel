<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\HomeCarousel;

class HomePage extends Component
{
    public function render()
    {
        $carousel = HomeCarousel::where('status', 1)->inRandomOrder()->limit(3)->get();
        return view('livewire.frontend.home-page', ['carousel' => $carousel])->layout('layouts.base');
    }
}
