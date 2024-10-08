<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;


class ServiceDetails extends Component
{

    public $service;

    // The component is mounted with the service ID
    public function mount(Service $service)
    {
        $this->service = $service;
    }


    public function render()
    {
        return view('livewire.service-details', [
            'service' => $this->service,])
                                        ->layout('layouts.app');
    }
}
