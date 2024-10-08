<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\banners as Banner;

class SwiperComponent extends Component
{
    public $images = [];

    public function mount()
    {
        // Fetch image paths from the database
        $this->images = Banner::pluck('image_path')->toArray();
    }


    public function render()
    {
        return view('livewire.swiper-component');
    }
}
