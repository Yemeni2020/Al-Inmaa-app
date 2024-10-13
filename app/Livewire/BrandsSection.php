<?php

namespace App\Livewire;

use Livewire\Component;

class BrandsSection extends Component
{

    public $brands = [];

    public function mount()
    {
        // Placeholder brands. You can replace this with actual database query.
        $this->brands = [
            ['name' => 'Brand 1', 'logo' => 'images/brands/photo5.png'],
            ['name' => 'Brand 2', 'logo' => 'images/brands/Photo2.jpg'],
            ['name' => 'Brand 3', 'logo' => 'images/brands/Photo3.jpg'],
            ['name' => 'Brand 4', 'logo' => 'images/brands/Photo4.jpg'],
            // Add more brands as necessary
        ];
    }
    public function render()
    {
        return view('livewire.brands-section')
        ->layout('layouts.app');;
    }
}
