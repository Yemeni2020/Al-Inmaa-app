<?php

namespace App\Livewire;

use App\Models\Branch;
use Livewire\Component;

class ContactUs extends Component
{
    public $branches;

    public function mount()
    {
        // Fetch all branches with their phone numbers and emails
        $this->branches = Branch::with(['phones', 'emails'])->get();
    }

    public function render()
    {
        return view('livewire.contact-us')->layout('layouts.app');
    }
}
