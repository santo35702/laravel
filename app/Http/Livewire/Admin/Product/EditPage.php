<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;

class EditPage extends Component
{
    public function render()
    {
        return view('livewire.admin.product.edit-page')->layout('layouts.admin');
    }
}
