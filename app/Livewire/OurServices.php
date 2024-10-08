<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
class OurServices extends Component
{

    // public $services;

    // public function mount()
    // {
    //     // Fetch services from database or API
    //     // $this->services = [
    //     //     ['title' => 'Web Development', 'description' => 'Professional Web Development services'],
    //     //     ['title' => 'SEO Services', 'description' => 'Top-notch SEO services'],
    //     // ];
    // }

    public function render()
    {
        $services = Service::paginate(6);
        return view('livewire.our-services',compact('services'))
        ->layout('layouts.app');
    }
}
