<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ProductsPreview extends Component
{
    public $products;

    public function mount()
    {
        // Fetch only 3 products to display on the homepage
        $this->products = Post::limit(3)->get();
    }
    public function render()
    {
        return view('livewire.products-preview')->layout('layouts.app');
    }
}
