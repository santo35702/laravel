<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;

class AddNewPage extends Component
{
    public function render()
    {
        return view('livewire.admin.category.add-new-page')->layout('layouts.admin');
    }
}
