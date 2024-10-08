<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Controllers\PostController;
use App\Models\Post;

class OurProducts extends Component
{

    // public $products;

    // public function mount()
    // {
    //     // Fetch products from database or API
    //     $this->products = [
    //         ['title' => 'Product 1', 'description' => 'High-quality product 1'],
    //         ['title' => 'Product 2', 'description' => 'Top-grade product 2'],
    //     ];
    // }
    public function render()
    {
        $post = Post::with(['images' => function ($query) {
            $query->limit(1); // Limit the images to 1 (first image)
        }])->paginate(3);
        return view('livewire.our-products' , compact('post'))->layout('layouts.app');
    }
}
