<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;

class IndexPage extends Component
{
    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.admin.category.index-page', ['categories' => $categories])->layout('layouts.admin');
    }
}
