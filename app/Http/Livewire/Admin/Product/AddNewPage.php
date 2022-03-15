<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class AddNewPage extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock_status;
    public $featured;
    public $image;
    public $category;
    public $quantity;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title, '-');
    }

    public function storeItem(Request $request)
    {
        $product = new Product();
        $product->title = $this->title;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->sku = $this->sku;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('product-images', $imageName);
        $product->image = $imageName;
        $product->category_id = $this->category;
        $product->quantity = $this->quantity;
        $product->save();
        $request->session()->flash('status', 'New Product Created successfully!');
    }
    
    public function render()
    {
        return view('livewire.admin.product.add-new-page')->layout('layouts.admin');
    }
}
