<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServicesPreview extends Component
{
    public $services;

    public function mount()
    {
        // Fetch only 3 services to display on the homepage
        $this->services = Service::limit(3)->get();
    }
    public function render()
    {
        return view('livewire.services-preview')->layout('layouts.app');
    }
}
