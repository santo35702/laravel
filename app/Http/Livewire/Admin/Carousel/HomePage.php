<?php

namespace App\Http\Livewire\Admin\Carousel;

use Livewire\Component;
use App\Models\HomeCarousel;

class HomePage extends Component
{
    public function render()
    {
        $carousel = HomeCarousel::all();
        return view('livewire.admin.carousel.home-page', ['carousel' => $carousel])->layout('layouts.admin');
    }
}
